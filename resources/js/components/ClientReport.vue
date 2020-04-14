<template>
  <div>
    <!-- one step -->
    <div class="col-md-12" v-show="pageView =='urls'">
      <h3>Hey, we found these Domains, Would you like to add them ?</h3>
      <ul>
        <li v-for="(url,index) in urls" :key="index">
          <input type="checkbox" v-model="selectedUrl" name="urls" :value="url.Url" />
          <a :href="url.Url">{{ url.Url }}</a>
        </li>
      </ul>
      <div class="form-group">
        <input type="checkbox" @change="selectAll" v-model="allSelected" id="checkAll" />
        <label for="checkAll">Check All</label>
      </div>
      <button class="btn btn-primary" @click="showGenerate">Contine</button>
    </div>
    <!-- one step  end-->

    <!-- second step -->
    <div class="col-md-6" v-show="pageView =='addNew'">
      <div class="card">
        <div class="card-body">
          <form @submit.prevent="generateReport">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <Label>Report Name</Label>
                  <input
                    class="form-control"
                    type="text"
                    placeholder="Enter Report Name"
                    v-model="form.name"
                    required
                  />
                </div>
                <div class="form-group">
                  <Label>Report Urls</Label>
                  <textarea cols="42" rows="5" v-model="form.urls" required></textarea>
                  <small>Urls are comma seprated</small>
                </div>
              </div>

              <div class="col-lg-12 text-center">
                <button type="submit" class="btn btn-block btn-dark">Generate Report</button>
                <button
                  type="submit"
                  class="btn btn-block btn-warning"
                  @click="pageView = 'urls'"
                >Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- second step end -->
  </div>
</template>

<script>
export default {
  name: "client-report",
  props: ["urls", "id"],
  data() {
    return {
      selectedUrl: [],
      pageView: "urls",
      form: {
        name: "",
        urls: ""
      },
      allSelected: false
    };
  },
  methods: {
    showGenerate() {
      this.form.urls = this.selectedUrl.toString();
      this.pageView = "addNew";
    },
    generateReport() {
      axios
        .post(`/clients/${this.id}/report`, this.form)
        .then(({ data }) => {
          console.log(data);
        })
        .catch(err => console.log(err));
    },
    selectAll: function() {
      this.selectedUrl = [];
      if (this.allSelected) {
        this.urls.forEach(url => {
          console.log(url);
          this.selectedUrl.push(url.Url);
        });
      }
    }
  }
};
</script>
