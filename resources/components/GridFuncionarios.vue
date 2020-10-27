<template>
    <div class="container mt-3">
      <table class="table table-striped">
        <thead>
          <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Cargo</th>
            <th scope="col">Salario</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(funcionario, index) in funcionarios" :key="funcionario.id" class="text-center">
            <td scope="row">{{ index+1 }}</td>
            <td>{{ funcionario.nome }}</td>
            <td>{{ funcionario.cargo }}</td>
            <td>{{ funcionario.salario }}</td>
            <td>
                <button class="btn btn-sm btn-danger" @click.prevent.stop="delFuncionario(funcionario.id)">Apagar</button>
                <button class="btn btn-sm btn-info">Editar</button>
            </td>
          </tr>    
        </tbody>
      </table>
    </div>
</template>

<script>
export default {

data(){
    return {        
     funcionarios : []  
    }
},

created(){
    axios.get('http://localhost:8000/api/funcionarios')
        .then(response => {
            this.funcionarios = response.data
        });        
},

methods:{
    delFuncionario(id){
        axios.delete(`http://localhost:8000/api/funcionarios/destroy/${id}`)
            .then(response => {
                let i = this.funcionarios.map(item => item.id).indexOf(id);
                this.funcionarios.splice(i, 1)
            });
    }
}

};
</script>

<style>
</style>