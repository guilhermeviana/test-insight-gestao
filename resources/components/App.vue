<template>
  <div>    
    <h2 class="text-center m-5">To Do List</h2>
    <formulario-funcionario
      @addOrUpdateFuncionario="addOrUpdateFuncionario"  
      :funcionario="funcionario"    
    ></formulario-funcionario>

    <grid-funcionarios
      :acoes="true"
      @delFuncionario="delFuncionario"
      @editFuncionario="editFuncionario"
      :funcionarios="funcionarios"
    ></grid-funcionarios>
  </div>
</template>

<script>
import FormularioFuncionario from "./ToDoList/FormularioFuncionario";
import GridFuncionarios from "./ToDoList/GridFuncionarios";

export default {
  components: {
    FormularioFuncionario,
    GridFuncionarios,
  },
  data() {
    return {
      funcionarios: [],
      funcionario: {
          nome : '',
          salario: 0,
          cargo : ''
      }
    };
  },
  methods: {
    resetFuncionario(){
      this.funcionario = {
          nome : '',
          salario: 0,
          cargo : ''
        };
    },
    refreshFuncionarios(){
      axios.get("https://test-insight-gestao.herokuapp.com/api/funcionarios").then((response) => {
       this.funcionarios = response.data;
       this.resetFuncionario();
    });
    },
    addOrUpdateFuncionario(funcionario) {      
      axios
        .post("https://test-insight-gestao.herokuapp.com/api/funcionarios/create", funcionario)
        .then((response) => {
          this.refreshFuncionarios(0);
          this.resetFuncionario();
        })
        .catch((error) => console.log(error))
        .finally(() => (this.loading = false));
    },

    delFuncionario(id) {
      axios
        .delete(`https://test-insight-gestao.herokuapp.com/api/funcionarios/destroy/${id}`)
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