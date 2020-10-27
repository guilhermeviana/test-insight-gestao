<template>
  <div class="container">
    <div class="row d-flex justify-content-center">
      <form class="form-inline mt-3">
        <input type="hidden" name="_token" :value="csrf" />
        <div class="form-group mx-sm-3 mb-2">
          <label for="nome" class="sr-only">Nome</label>
          <input
            required
            v-model="funcionario.nome"
            type="text"
            class="form-control"
            id="nome"
            placeholder="Nome"
            name="nome"
          />
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <label for="cargo" class="sr-only">Cargo</label>
          <input
            required
            v-model="funcionario.cargo"
            type="text"
            class="form-control"
            id="cargo"
            placeholder="Cargo"
            name="cargo"
          />
        </div>
        <div class="form-group mx-sm-3 mb-2">
          <label for="salario" class="sr-only">Salário</label>
          <input
            required
            v-model="funcionario.salario"
            type="number"
            class="form-control"
            id="salario"
            placeholder="Salário"
            name="salario"
          />
        </div>
        <button
          :disabled="disabled"
          @click.prevent.stop="$emit('addOrUpdateFuncionario', funcionario)"
          class="btn btn-success mx-sm-3 mb-2"
        >
          Salvar
        </button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    funcionario: {
      Object,
      required: true
    }
  },
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),      
      disabled: true,
    };
  },

  watch: {
    funcionario: {
      handler(atual) {
        if (atual.nome != "" && atual.salario > 0 && atual.cargo != "") {
          this.disabled = false;
        } else {
          this.disabled = true;
        }
      },
      deep: true,
    },
  },
};
</script>

<style>
</style>