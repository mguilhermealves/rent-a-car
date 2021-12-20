<template>
    <div class="col-md-12">
        <datepicker-report :format="customDate" v-model="time" ></datepicker-report>
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
            customData(date){
            var date = moment(date).format('YYYY-MM-DD');
            alert('ola')
            $('#booked_in').val(date)
            console.log(date);
            }
        }
    }
</script>
