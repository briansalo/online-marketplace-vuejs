
<template>
<div class="row form-inline form-group mt-1">
    <div class="col-md-4">
         <select class="form-control" name="category_id" v-model="category" @change="getSubcategories()">
        	<option v-for="data in categories" :value="data.id" :key="data.id">{{data.name}}</option>
       </select>
    </div>

   <div class="col-md-4">
         <select class="form-control" name="subcategory_id" v-model="subcategory" @change="getChildcategories()">
           <option value="0" selected="" disabled=""> choose subcategory</option>
        	<option v-for="data in subcategories" :value="data.id" :key="data.id">{{data.name}}</option>
       </select>
    </div>

   <div class="col-md-4">
         <select class="form-control" name="childcategory_id" v-model="childcategory">
            <option value="0" selected="" disabled=""> choose childcategory</option>
        	<option v-for="data in childcategories" :value="data.id" :key="data.id">{{data.name}}</option>
       </select>
    </div>
    <div>
    </div>
</div>
</template>

<script>

export default({
    //the data here came from advertisement_edit.blade
props:['categoryId','subcategoryId','childcategoryId'],

    data() {
        return{
            category:this.categoryId,
            categories:[],
            subcategory:this.subcategoryId,
            subcategories:[],
            childcategory:this.childcategoryId,
            childcategories:[],            

        }
        
    },
    mounted(){
        //you need to call the methods here that you created in order to read/call the method  
        this.getAllCategories();
        this.getAllSubcategories();
        this.getAllChildcategories();
    },
    methods:{
        //the response data from /api/category  will be push in categories data/variable
        getAllCategories(){
            axios.get('/api/category').then((response)=>{
                this.categories = response.data
            })
        },
        getAllSubcategories(){
            axios.get('/api/subcategory',{params:{
                category_id:this.category
            }}).then((response)=>{
                this.subcategories = response.data
            })
        },
        getAllChildcategories(){
            axios.get('/api/childcategory',{params:{
                subcategory_id:this.subcategory
            }}).then((response)=>{
                this.childcategories = response.data
            })
        },


        getSubcategories(){
            axios.get('/api/subcategory',{params:{category_id:this.category}})
            .then((response)=>{
                this.subcategories = response.data

                this.childcategories = 0;//in order to make empty the option until user choose for the subcategory
                this.childcategory = 0;//in order to select the "choose childcategory" option
                this.subcategory = 0;//in order to select the "choose subcategory" option
            })

        },


        getChildcategories(){
            axios.get('/api/childcategory',{params:{subcategory_id:this.subcategory}})
            .then((response)=>{
                this.childcategories = response.data
                this.childcategory = 0;//in order to select "choose category" option
            })
        },

    }
})
</script>
