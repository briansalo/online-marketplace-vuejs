<template>
<div class="row">

    <div class="col-md-4">
        <select class="form-control" name="province_id" v-model="province" @change="getCity()">
            <option value="" selected="" disabled=""> Select Province</option>
            <option v-for="data in provinces" :value="data.id" :key="data.id">{{data.name}}</option>
        </select>
    </div>

    <div class="col-md-4">
        <select class="form-control" name="city_id" v-model="city" @change="getBarangay()">
             <option value="" selected="" disabled=""> Select City</option>
            <option v-for="data in cities" :value="data.id" :key="data.id">{{data.name}}</option>
        </select>
    </div>

    <div class="col-md-4">
        <select class="form-control" name="barangay_id" v-model="barangay">
            <option value="" selected="" disabled=""> Select Barangay</option>
            <option v-for="data in barangays" :value="data.id" :key="data.id">{{data.name}}</option>
        </select>
    </div>

</div>
</template>

<script>
export default({
    data() {
        return{
            province:'',
            provinces:[],
            city:'',
            cities:[],
            barangay:'',
            barangays:[],

        }
        
    },
    mounted(){
        //you need to call the methods here that you created in order to read the method 
        this.getProvince();
    },
    methods:{
        //the response data from /api/province  will be push in categories data/variable
        getProvince(){
            axios.get('/api/province').then((response)=>{
                this.provinces = response.data
            })
        },
        getCity(){
            axios.get('/api/city',{params:{province_id:this.province}})
            .then((response)=>{
                this.cities = response.data
            })
        },
        getBarangay(){
            axios.get('/api/barangay',{params:{city_id:this.city}})
            .then((response)=>{
                this.barangays = response.data
            })
        },
    }
})
</script>
