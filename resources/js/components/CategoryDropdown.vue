<template>
<div class="row form-inline form-group mt-1">
    <div class="col-md-4">
         <select class="form-control" name="category_id" v-model="category" @change="getSubcategories()">
            <option value="" selected="" disabled> choose category</option>
        	<option v-for="data in categories" :value="data.id" :key="data.id">{{data.name}}</option>
       </select>
    </div>

   <div class="col-md-4">
         <select class="form-control" name="subcategory_id" v-model="subcategory" @change="getChildcategories()">
            <option value="" selected="" disabled=""> choose subcategory</option>
        	<option v-for="data in subcategories" :value="data.id" :key="data.id">{{data.name}}</option>
       </select>
    </div>

   <div class="col-md-4">
         <select class="form-control" name="childcategory_id">
            <option value="" selected="" disabled=""> choose childcategory</option>
        	<option v-for="data in childcategories" :value="data.id" :key="data.id">{{data.name}}</option>
       </select>
    </div>
</div>
</template>

<script>

export default({
    data() {
        return{
            category:'',
            categories:[],
            subcategory:'',
            subcategories:[],
            childcategory:0,
            childcategories:[],

        }
        
    },
    mounted(){
        //you need to call the methods here that you created in order to read the method 
        this.getCategories();
    },
    methods:{
        //the response data from /api/category  will be push in categories data/variable
        getCategories(){
            axios.get('/api/category').then((response)=>{
                this.categories = response.data
            })
        },
        getSubcategories(){
            axios.get('/api/subcategory',{params:{category_id:this.category}})
            .then((response)=>{
                this.subcategories = response.data
            })
        },
        getChildcategories(){
            axios.get('/api/childcategory',{params:{subcategory_id:this.subcategory}})
            .then((response)=>{
                this.childcategories = response.data
            })
        },
    }
})
</script>
