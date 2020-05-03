<template>
  <div class="row">
    <div class="col-12">
      <div class="row">
        <div class="col">
          <label for="search">Search</label>
          <input
            type="text"
            class="form-control"
            placeholder="Seach"
            id="search"
            v-model="form.search"
            required
            @change="getVides"
          />
        </div>
        <div class="col">
          <label for="start">Start</label>
          <Datepicker
            id="start"
            v-model="form.start"
            required
            format="MM/dd/yyyy"
            :disabledDates="state.disabledDates"
          />
          <!-- <input
            type="text"
            class="form-control datepicker"
            id="start"
            v-model="form.start"
            required
            @change="getVides"
          />-->
        </div>
        <div class="col">
          <label for="end">End</label>
          <Datepicker
            id="end"
            v-model="form.end"
            required
            format="MM/dd/yyyy"
            :disabledDates="state.disabledDates"
          />
          <!-- <input
            type="text"
            class="form-control datepicker"
            id="end"
            v-model="form.end"
            required
            @change="getVides"
          />-->
        </div>
        <div class="col">
          <label for="tv">TV</label>
          <select class="form-control" name="tv" id="tv" v-model="form.tv" @change="getVides">
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
        </div>
        <div class="col">
          <label for="end">Radio</label>
          <select
            class="form-control"
            name="radio"
            id="radio"
            v-model="form.radio"
            @change="getVides"
          >
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
        </div>
      </div>
    </div>

    <div class="col-12 p-5" v-show="videos && !loader" v-for="video in videos" :key="video.id">
      <p>
        Report of
        <b>
          <u>{{ video.ccTextHiWords }}</u>
        </b>
      </p>
      <div class="row">
        <div class="col-md-3">
          <img :src="video.thumbnailUrl" alt="thumbnail url" width="200" v-if="video.thumbnailUrl" />
          <img :src="video.thumbnails[0]" alt="thumbnail url" width="200" v-else />
        </div>
        <div class="col-md-9">
          <h3>{{ video.title }}</h3>
          <p v-html="video.ccText"></p>
          <button
            @click="showEditor(video.mediaUrl)"
            v-show="video.mediaUrl"
            class="btn btn-success"
            data-toggle="modal"
            data-target="#exampleModal"
          >Edit</button>
        </div>
      </div>
      <div class="row text-center">
        <button
          class="btn btn-success"
          data-toggle="modal"
          data-target="#addToReport"
          @click="setVideoStats(video)"
        >Add to Report</button>
      </div>
    </div>
    <div class="col-12 p-5" v-show="!loader && videos.length == 0">
      <h2>No data found.</h2>
    </div>

    <!-- content placeholder -->
    <div class="col-12 pt-2" v-show="loader">
      <content-loader primaryColor="#f3f3f3" secondaryColor="#ecebeb">
        <rect x="19" y="18" rx="0" ry="0" width="80" height="80" />
        <rect x="120" y="20" rx="0" ry="0" width="280" height="5" />
        <rect x="120" y="30" rx="0" ry="0" width="280" height="5" />
        <rect x="120" y="40" rx="0" ry="0" width="280" height="5" />
        <rect x="120" y="50" rx="0" ry="0" width="280" height="5" />
        <rect x="120" y="60" rx="0" ry="0" width="280" height="5" />
        <rect x="120" y="70" rx="0" ry="0" width="280" height="5" />
        <rect x="120" y="80" rx="0" ry="0" width="280" height="5" />
        <rect x="120" y="90" rx="0" ry="0" width="280" height="5" />
      </content-loader>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row justify-content-center">
              <img src="/images/loader.gif" alt="loader" v-show="!iframe.loaded" />
            </div>
            <iframe
              :src="editorSrc"
              frameborder="0"
              width="600"
              height="600"
              ref="frame"
              @load="load"
              v-show="iframe.loaded"
            ></iframe>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="addToReport">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Video To Report</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="addVideoToReport">
              <div class="form-group">
                <label for="report">Report</label>
                <select class="form-control" v-model="videoForm.reportId">
                  <option value="0" disabled required>Select</option>
                  <option
                    v-for="(report,index) in reports"
                    :key="index"
                    :value="report.id"
                  >{{ report.name }}</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Video Url</label>
                <input
                  type="url"
                  required
                  class="form-control"
                  placeholder="Paste video url"
                  v-model="videoForm.videoUrl"
                />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">Add To Report</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ContentLoader } from "vue-content-loader";
import Datepicker from "vuejs-datepicker";
export default {
  props: ["reports"],
  data() {
    return {
      state: {
        disabledDates: {
          from: new Date()
        }
      },
      form: {
        search: "",
        start: "",
        end: "",
        tv: 1,
        radio: 0
      },
      videos: {},
      loader: false,
      editorSrc: "",
      videoForm: {
        reportId: 0,
        videoUrl: null,
        national_audience: "",
        local_audience: ""
      },
      iframe: {
        loaded: false
      }
    };
  },
  components: {
    ContentLoader,
    Datepicker
  },
  methods: {
    load: function() {
      this.iframe.loaded = true;
    },
    getVides() {
      this.loader = true;
      if (
        this.form.search != "" &&
        this.form.start != "" &&
        this.form.end != ""
      ) {
        // form data
        let formData = {
          start: this.form.start,
          end: this.form.end,
          requiredKeywords: this.form.search,
          ctv: this.form.tv,
          cradio: this.form.radio
        };
        axios
          .post("video-report", formData)
          .then(({ data }) => {
            this.loader = false;
            if (data.data.status_code == 400) {
              alert(data.data.message);
            }
            if (data.status) {
              this.videos = data.data.results.clips;
            }
          })
          .catch(err => {
            this.loader = false;
            console.log(err);
          });
      }
    },
    showEditor(url) {
      this.iframe.loaded = false;
      this.editorSrc = url;
    },
    addVideoToReport() {
      axios
        .post("/add-video-to-report", this.videoForm)
        .then(({ data }) => {
          $("#addToReport").modal("hide");
          $(".modal-backdrop").remove();
          alert(data.message);
        })
        .catch(error => console.log(error));
    },
    setVideoStats(video) {
      this.videoForm.local_audience = video.localNumHouseholds;
      this.videoForm.national_audience = video.numHouseholds;
    }
  },
  watch: {
    form: {
      handler(val, oldVal) {
        this.getVides();
      },
      deep: true
    }
  }
};
</script>

<style scoped>
.modal-dialog {
  max-width: 635px;
}
</style>