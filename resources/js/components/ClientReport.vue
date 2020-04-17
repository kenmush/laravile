<template>
  <div>
    <!-- main -->
    <div class="col-md-12" v-show="pageView =='main'">
      <div class="p-2 text-right">
        <button class="btn btn-success" @click="pageView ='urls'">Add New</button>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Report Name</th>
            <th scope="col">Logo</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(report,index) in reports" :key="index">
            <th scope="row">{{ index }}</th>
            <td>{{ report.name }}</td>
            <td>
              <img :src="report.logo" alt="Logo" v-show="report.logo" />
            </td>
            <td>
              <a :href="`/report/${report.id}`" target="_blank" class="btn btn-success">View</a>
              <a :href="`/report/${report.id}/edit`" class="btn btn-warning">Edit</a>
              <button class="btn btn-danger" @click="deleteReport(report.id)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- main step  end-->

    <!-- one step -->
    <div class="col-md-12" v-show="pageView =='urls'">
      <h3>Hey, we found these Domains, Would you like to add them ?</h3>
      <ul>
        <li v-for="(url,index) in urls" :key="index">
          <input type="checkbox" v-model="selectedUrl" name="urls" :value="url.Url" :id="index" />
          <label :for="index">{{ url.Url }}</label>
        </li>
      </ul>
      <div class="form-group">
        <input type="checkbox" @change="selectAll" v-model="allSelected" id="checkAll" />
        <label for="checkAll">Check All</label>
      </div>
      <button class="btn btn-primary" @click="showGenerate">Contine</button>
      <button class="btn btn-warning" @click="pageView='main'">Cancel</button>
    </div>
    <!-- one step  end-->

    <!-- second step -->
    <div class="col-md-6" v-show="pageView =='addNew' && !loader">
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

    <!-- third step -->
    <div class="col-md-8" v-show="pageView =='success' && !loader">
      <div class="card">
        <div class="card-body">
          <h3>Your Report has been generated successfully!</h3>
          <img :src="reportLogo" width="50" />
          <p>{{reportName }}</p>
        </div>
        <div class="card-footer text-muted">
          <a :href="viewUrl" class="btn btn-success" target="_blank">View Report</a>
          <a :href="editUrl" class="btn btn-warning" target="_blank">Edit Report</a>
          <button class="btn btn-info" @click="pageView ='main'">Home</button>
        </div>
      </div>
    </div>
    <!-- third step end -->

    <!-- loader -->
    <div class="col-md-6 text-center" v-show="loader">
      <h3>Please wait while we generate your report</h3>
      <content-loader primaryColor="#f3f3f3" secondaryColor="#ecebeb">
        <rect x="19" y="18" rx="0" ry="0" width="80" height="80" />
        <rect x="120" y="20" rx="0" ry="0" width="280" height="10" />
        <rect x="120" y="55" rx="0" ry="0" width="280" height="10" />
        <rect x="120" y="90" rx="0" ry="0" width="280" height="10" />
      </content-loader>
    </div>
    <!-- loader  end-->
  </div>
</template>

<script>
import { ContentLoader } from "vue-content-loader";
export default {
  name: "client-report",
  props: ["urls", "id", "reports"],
  data() {
    return {
      selectedUrl: [],
      pageView: "main",
      form: {
        name: "",
        urls: ""
      },
      allSelected: false,
      loader: false,
      reportName: null,
      reportLogo: null,
      editUrl: null,
      viewUrl: null
    };
  },
  components: {
    ContentLoader
  },
  methods: {
    showGenerate() {
      this.form.urls = this.selectedUrl.toString();
      this.pageView = "addNew";
    },
    generateReport() {
      this.loader = true;
      axios
        .post(`/clients/${this.id}/report`, this.form)
        .then(({ data }) => {
          this.loader = false;
          this.pageView = "success";
          if (data.data) {
            this.reportName = data.data.name;
            this.reportLogo = data.data.logo;
            this.editUrl = data.data.editUrl;
            this.viewUrl = data.data.viewUrl;
          }
        })
        .catch(err => {
          console.log(err);
          this.loader = false;
        });
    },
    selectAll: function() {
      this.selectedUrl = [];
      if (this.allSelected) {
        this.urls.forEach(url => {
          console.log(url);
          this.selectedUrl.push(url.Url);
        });
      }
    },
    deleteReport(id) {
      let ans = confirm("Are you sure?");
      if (ans) {
        console.log(id);
        axios
          .delete(`/report/${id}/destroy`)
          .then(({ data }) => {
            if (data.status) {
              location.reload();
            }
          })
          .catch(err => console.log(err));
      }
    }
  }
};
</script>
