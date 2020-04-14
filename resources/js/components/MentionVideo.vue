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
          <input
            type="date"
            class="form-control"
            id="start"
            v-model="form.start"
            required
            @change="getVides"
          />
        </div>
        <div class="col">
          <label for="end">End</label>
          <input
            type="date"
            class="form-control"
            id="end"
            v-model="form.end"
            required
            @change="getVides"
          />
        </div>
        <div class="col">
          <label for="tv">TV</label>
          <select class="form-control" name="tv" id="tv" v-model="form.tv">
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
        </div>
        <div class="col">
          <label for="end">Radio</label>
          <select class="form-control" name="radio" id="radio" v-model="form.radio">
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
          <img :src="video.thumbnails[0]" alt="thumbnail url" width="200" v-if="video.thumbnails" />
        </div>
        <div class="col-md-9">
          <h3>{{ video.title }}</h3>
          <p v-html="video.ccText"></p>
          <a :href="video.mediaUrl" v-show="video.mediaUrl">Video Url</a>
        </div>
      </div>
      <div class="row text-center">
        <button class="btn btn-success">Add to Report</button>
      </div>
    </div>
    <div class="col-12 p-5" v-show="videos.length == 0">
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
  </div>
</template>

<script>
import { ContentLoader } from "vue-content-loader";
export default {
  data() {
    return {
      form: {
        search: "",
        start: "",
        end: "",
        tv: 1,
        radio: 0
      },
      videos: {},
      loader: false
    };
  },
  components: {
    ContentLoader
  },
  methods: {
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
            if (data.status) {
              this.videos = data.data.results.clips;
            }
          })
          .catch(err => {
            this.loader = false;
            console.log(err);
          });
      }
    }
  }
};
</script>
