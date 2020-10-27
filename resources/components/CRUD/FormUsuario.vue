<template>
  <div class="container mt-5">
    <form>
      <div class="form-group">
        <label for="formGroupExampleInput">Nome</label>
        <input
          v-model="funcionario.nome"
          type="text"
          class="form-control"
          id="nome"
          name="nome"
        />
      </div>
      <div class="form-group">
        <label for="cargo">Cargo</label>
        <input
          v-model="funcionario.cargo"
          type="text"
          class="form-control"
          name="cargo"
          id="cargo"
        />
      </div>
      <div class="form-group">
        <label for="salario">Salário</label>
        <input
          v-model="funcionario.salario"
          type="number"
          class="form-control"
          name="salario"
          id="salario"
        />
      </div>
      <div class="row text-right mt-4">
        <div class="col-12">
          <button
            @click.prevent.stop="addOrUpdateFuncionario(funcionario)"
            class="btn btn-success"
          >
            Salvar
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return { funcionario: {} };
  },
  methods: {
    //por falta de tempo :/ (dava para reutilizar o mesmo metodo do gridFuncionarios)
    addOrUpdateFuncionario(funcionario) {
      axios
        .post("http://localhost:8000/api/funcionarios/create", funcionario)
        .then((response) => {
          location.href = '/crud';
        })
        .catch((error) => console.log(error))
        .finally(() => (this.loading = false));
    },
  },
  created() {
    axios.get(
        `http://localhost:8000/api/funcionarios/edit/${this.$route.params.id}`
      )
      .then((response) => {
        this.funcionario = response.data;
      });
  },
};
</script>

<style>
</style>