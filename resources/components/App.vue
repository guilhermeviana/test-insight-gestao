<template>
  <div>
    <formulario-funcionario></formulario-funcionario>
    <grid-funcionarios></grid-funcionarios>
  </div>
</template>

<script>
import FormularioFuncionario from "./FormularioFuncionario";
import GridFuncionarios from "./GridFuncionarios";

export default {
  components: {
    FormularioFuncionario,
    GridFuncionarios,
  },
};
</script>

<style>
</style>