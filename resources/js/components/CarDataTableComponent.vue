<template>
    <div class="container">
            <table id="table-cars" class="table table-bordered table-hover datatables">
            <thead>
               <tr>
                  <th>Modelo</th>
                  <th>Marcar</th>
                  <th>Placa</th>
                  <th>Ano</th>
                  <th>Ações</th>
    
               </tr>
            </thead>
            <tbody>
               <tr v-for="(car, index) in cars" :key="index.id"> 
                  <td>{{ car.model }}</td>
                  <td>{{ car.brand }}</td>
                  <td>{{ car.license_plate }}</td>
                  <td>{{ car.year_of_manufacture }}</td>
                  <td align="right">
                     <button type="button" @click="edit(car)" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil"></i> Editar</button>     
                      <button type="button" @click="destroy(car)" class="btn btn-danger btn-flat btn-xs"><i class="fa fa-trash"></i> Excluir</button>    
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
            this.getCars()
        },
        data(){
           return {
              cars: []
           }
        },
        methods: {
           table(){
              this.$nextTick(() => {
                 $('#table-cars').DataTable();
              });
           },
           getCars(){
              axios.get('cars/data').then(res=>{
             this.cars = res.data
             this.table()
           },
           
           );
        },
        edit(car){
            window.location = "cars/"+car.id+"/edit"
        },
        destroy(car){
            Swal.fire({
            title: 'Tem certeza que deseja deletar?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Sim',
            denyButtonText: `Não`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {  
               axios.post('cars/'+car.id,{_method: 'delete'}).then(res=>{
               this.getCars()
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
