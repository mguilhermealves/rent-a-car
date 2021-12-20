<template>
    <div class="container">
            <table id="table-users" class="table table-bordered table-hover datatables">
            <thead>
               <tr>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>CPF</th>
                  <th>Ações</th>
    
               </tr>
            </thead>
            <tbody>
               <tr v-for="(user, index) in users">
                  <td>{{ user.name }}</td>
                       <td>{{ user.email }}</td>
                            <td>{{ user.cpf }}</td>
                  <td align="right">
                     <button type="button" @click="edit(user)" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil"></i> Editar</button>     
                      <button type="button" @click="destroy(user)" class="btn btn-danger btn-flat btn-xs"><i class="fa fa-trash"></i> Excluir</button>    
                  </td>
            </tr>
            </tbody>
         </table>
    </div>
</template>
<script>
const Swal = require('sweetalert2')
    export default {
        mounted() {
            this.getUsers()
        },
        data(){
           return {
              users: []
           }
        },
        methods: {
           table(){
              this.$nextTick(() => {
                 $('#table-users').DataTable();
              });
           },
           getUsers(){
              axios.get('users/data').then(res=>{
             this.users = res.data
             this.table()
           },
           
           );
        },
        edit(user){
            window.location = "users/"+user.id+"/edit"
        },
        destroy(user){
            Swal.fire({
            title: 'Tem certeza que deseja deletar?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Sim',
            denyButtonText: `Não`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {  
               axios.post('users/'+user.id,{_method: 'delete'}).then(res=>{
               this.getUsers()
               Swal.fire('Deletado!', '', 'success')
               })
          
            } else if (result.isDenied) {
               Swal.fire('Nada foi modificado', '', 'info')
            }
            })
        }
      }
    }
</script>
