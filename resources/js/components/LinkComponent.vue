<template>
  <div class="card mt-4">
    <div
      class="card-header"
    >Publicdo em {{ link.created_at }} - Última atualização {{ link.updated_at }}</div>
    <div class="card-body">
      <div v-if="editMode">
        <input type="text" class="form-control" v-model="link.label" />
        <input type="text" class="form-control" v-model="link.url" />
      </div>
      <p v-else>{{ link.label }} ({{ link.url }})</p>
    </div>
    <div class="card-footer">
      <button v-if="editMode" class="btn btn-success" v-on:click="onClickUpdate()">Salvar</button>
      <button v-else class="btn btn-default" v-on:click="onClickEdit()">Editar</button>
      <button class="btn btn-danger" v-on:click="onClickDelete()">Deletar</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["link"],
  data() {
    return {
      editMode: false
    };
  },

  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    onClickDelete() {
      axios.delete(`/links/${this.link.id}`).then(() => {
        this.$emit("delete");
      });
    },
    onClickEdit() {
      this.editMode = true;
    },
    onClickUpdate() {
      const params = {
        label: this.link.label,
        url: this.link.url
      };
      axios.put(`/links/${this.link.id}`, params).then(response => {
        this.editMode = false;
        const link = response.data;
        this.$emit("update", link);
      });
    }
  }
};
</script>
