<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form-component @new="addLink"></form-component>
      <link-component
        v-for="(link, index) in links"
        :key="link.id"
        :link="link"
        @update="updateLink(index, ...arguments)"
        @delete="deleteLink(index)"
      ></link-component>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      links: []
    };
  },
  mounted() {
    axios.get("/links").then(response => {
      this.links = response.data;
    });
  },
  methods: {
    addLink(link) {
      this.links.push(link);
    },
    updateLink(index, tought) {
      this.links[index] = link;
    },
    deleteLink(index) {
      this.links.splice(index, 1);
    }
  }
};
</script>
