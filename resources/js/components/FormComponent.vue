<template>
  <div class="card">
    <div class="card-header">Adicione um novo link</div>
    <div class="card-body">
      <form action v-on:submit.prevent="newLink()">
        <div class="form-group">
          <label for="label">Nome</label>
          <input type="text" class="form-control" name="label" v-model="label" ref="label" />
          <label for="url">URL</label>
          <input type="text" class="form-control" name="url" v-model="url" ref="url" />
        </div>
        <button class="btn btn-primary">Adicionar Link</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      label: "",
      url: ""
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    newLink() {
      if (this.label == "" && this.url == "") {
        alert("Preencha todos os campos!");
      } else {
        const params = {
          label: this.label,
          url: this.url
        };
        this.label = "";
        this.url = "";
        axios.post("/links", params).then(response => {
          const link = response.data;
          this.$emit("new", link);
        });
      }
    }
  }
};
</script>
