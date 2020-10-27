import Vue from 'vue';
import VueRouter from 'vue-router';

import GridFuncionarios from '../components/ToDoList/GridFuncionarios';
import FormUsuario from '../components/CRUD/FormUsuario';
import App from '../components/App';


Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path: '/crud',
            name: 'crud',
            component: GridFuncionarios,
            props : {acoes : false, funcionarios: {}}
        },        
        {
            path: '/todolist',
            name: 'todolist',
            component: App
        }, 
        {
            path: '/funcionario/create',
            name: 'funcionario',
            component: FormUsuario
        },       
        
    ]
});


export default router;