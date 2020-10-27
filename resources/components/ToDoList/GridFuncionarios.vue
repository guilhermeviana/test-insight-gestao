<template>
  <div class="container mt-3">
    <p v-if="funcionarios.length == 0">Nenhum funcionário encontrado.</p>
    <table v-else class="table table-striped">
      <thead>
        <tr class="text-center">
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Cargo</th>
          <th scope="col">Salário</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="(funcionario, index) in funcionarios"
          :key="funcionario.id"
          class="text-center"
        >
          <td scope="row">{{ index + 1 }}</td>
          <td>{{ funcionario.nome }}</td>
          <td>{{ funcionario.cargo }}</td>
          <td>{{ funcionario.salario }}</td>
          <td>
            <div v-if="acoes">
              <button
                class="btn btn-sm btn-danger"
                @click.prevent.stop="$emit('delFuncionario', funcionario.id)"
              >
                Apagar
              </button>
              <button
                class="btn btn-sm btn-info"
                @click.prevent.stop="$emit('editFuncionario', funcionario)"
              >
                Editar
              </button>
            </div>
            <div v-else class="row text-center justify-content-center">
              <button
                class="btn btn-sm btn-danger mr-1"
                @click.prevent.stop="delFuncionario(funcionario.id)"
              >
                Apagar
              </button>

              <router-link
                class="btn btn-sm btn-info"
                tag="button"
                to="/funcionario"
              >
                Editar
              </router-link>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: ["funcionarios", "acoes"],
  methods: {
    resetFuncionario() {
      this.funcionario = {
        nome: "",
        salario: 0,
        cargo: "",
      };
    },
    refreshFuncionarios() {
      axios.get("http://localhost:8000/api/funcionarios").then((response) => {
        this.funcionarios = response.data;
        this.resetFuncionario();
      });
    },
    addOrUpdateFuncionario(funcionario) {
      axios
        .post("http://localhost:8000/api/funcionarios/create", funcionario)
        .then((response) => {
          this.refreshFuncionarios(0);
          this.resetFuncionario();
        })
        .catch((error) => console.log(error))
        .finally(() => (this.loading = false));
    },

    delFuncionario(id) {
      axios
        .delete(`http://localhost:8000/api/funcionarios/destroy/${id}`)
        .then((response) => {
          let i = this.funcionarios.map((item) => item.id).indexOf(id);
          this.funcionarios.splice(i, 1);
        });
    },
    editFuncionario(funcionario) {
      this.funcionario = funcionario;
    },
  },
  created() {
    this.refreshFuncionarios();
  },
};
</script>

<style>
</style>