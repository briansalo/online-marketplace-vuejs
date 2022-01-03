<template>
<div class="row">

    <div class="col-md-4">
        <select class="form-control" name="province_id" v-model="province" @change="getCity()">
            <option v-for="data in provinces" :value="data.id" :key="data.id">{{data.name}}</option>
        </select>
    </div>

    <div class="col-md-4">
        <select class="form-control" name="city_id" v-model="city" @change="getBarangay()">
             <option value="0" selected="" disabled=""> Select City</option>
            <option v-for="data in cities" :value="data.id" :key="data.id">{{data.name}}</option>
        </select>
    </div>

    <div class="col-md-4">
        <select class="form-control" name="barangay_id" v-model="barangay">
            <option value="0" selected="" disabled=""> Select Barangay</option>
            <option v-for="data in barangays" :value="data.id" :key="data.id">{{data.name}}</option>
        </select>
    </div>

</div>
</template>

<script>
export default({
    //the data here came from advertisement_edit.blade
props:['provinceId','cityId','barangayId'],
    data() {
        return{
            province:this.provinceId,
            provinces:[],
            city:this.cityId,
            cities:[],
            barangay:this.barangayId,
            barangays:[],

        }
        
    },
    mounted(){
        //you need to call the methods here that you created in order to read the method 
        this.getAllProvince();
        this.getAllCity();
        this.getAllBarangay();
    },
    methods:{
        //the response data from /api/province  will be push in categories data/variable
        getAllProvince(){
            axios.get('/api/all/province').then((response)=>{
                this.provinces = response.data
            })
        },
        getAllCity(){
            axios.get('/api/all/city').then((response)=>{
                this.cities = response.data
            })
        },
        getAllBarangay(){
            axios.get('/api/all/barangay').then((response)=>{
                this.barangays = response.data
            })
        },

        getCity(){
            axios.get('/api/city',{params:{province_id:this.province}})
            .then((response)=>{
                this.cities = response.data
                
                this.barangays = 0;//in order to make empty the option until user choose for the province
                this.barangay = 0;//in order to select the "select barangay" option
                this.city = 0;//in order to select the "select city" option
            })
        },
        getBarangay(){
            axios.get('/api/barangay',{params:{city_id:this.city}})
            .then((response)=>{
                this.barangays = response.data
                this.barangay = 0;//in order to select "select barangay" option
            })
            console.log(this.getBarangay);
        },
    }
})
</script>
