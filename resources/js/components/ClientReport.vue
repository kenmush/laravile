<template>
  <div class="col-md-12">
    <h3>Hey, we found these Domains, Would you like to add them ?</h3>
    <ul>
      <li v-for="url in urls" :key="url">
        <input type="checkbox" v-model="selectedUrl" name="urls" :value="url.Url" />
        <a :href="url.Url">{{ url.Url }}</a>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "client-report",
  props: ["urls"],
  data() {
    return {
      selectedUrl: []
    };
  },
  created() {
    console.log(this.urls);
  }
};
</script>
