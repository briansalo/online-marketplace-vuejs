<template>
 <div class="row">
     <div class="col-md-4">
        <input type="file" name="feature_image" @change="onFileChangeFeature" class="custom-file-upload" 
        required="" accept="image/*">
        <div id="preview">
            <img v-if="urlfeature" :src="urlfeature" width="100" height="60">
        </div>   
     </div>

     <div class="col-md-4">
        <input type="file" name="first_image" @change="onFileChangeFirst" class="custom-file-upload" 
        required="" accept="image/*">
        <div id="preview">
            <img v-if="urlfirst" :src="urlfirst" width="100" height="60">
        </div>   
     </div>

     <div class="col-md-4">
        <input type="file" name="second_image" @change="onFileChangeSecond" class="custom-file-upload" 
        required="" accept="image/*">
        <div id="preview">
            <img v-if="urlsecond" :src="urlsecond" width="100" height="60">
        </div>   
     </div>
 </div>
</template>

<script>
//import { defineComponent } from '@vue/composition-api'

export default ({

    data(){
        return{
            urlfeature:'',
            urlfirst:'',
            urlsecond:''
        }
        
    },
    methods:{
        onFileChangeFeature(e){
            const file=e.target.files[0];
            this.urlfeature = URL.createObjectURL(file)
        },
        onFileChangeFirst(e){
            const file=e.target.files[0];
            this.urlfirst = URL.createObjectURL(file)
        },
        onFileChangeSecond(e){
            const file=e.target.files[0];
            this.urlsecond = URL.createObjectURL(file)
        }
    }
})
</script>

