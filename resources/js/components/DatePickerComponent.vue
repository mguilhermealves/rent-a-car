<template>
    <div class="col-md-12">
        <datepicker :format="customDate" v-model="time" inline=true></datepicker>
    </div>

</template>
<script>

    import datepicker from 'vuejs-datepicker';
    import moment from 'moment';


    export default {
        components:{
            datepicker
        },
        methods:{
            customDate(date){

         
                var date = moment(date).format('YYYY-MM-DD');
                $('#booked_in').val(date)
                console.log(date);
                axios.post('available-cars', {
                date: date
          
            }
            )
            .then(function (response) {
                var select = $('#car_id');
                select.empty();
                $.each(response.data, function(index, data) {
                        $('<option>').val(data.id).text('Placa: '+data.license_plate + ' | ' +data.model).appendTo(select);
                });
            })
            .catch(function (error) {
                console.log(error);
            });

            }
        }
    }
</script>
