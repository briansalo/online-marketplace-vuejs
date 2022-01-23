<template>
<div>
    <button v-if="saveBtn" class="btn btn-success" @click.prevent="saveAd()">
			<i class="fas fa-heart"></i> Save this Ad
    </button>
    <p v-else class="alert alert-success">
        Advertisement Saved !!!
    </p>
</div>
</template>
<script>

export default{
    props:['adsId','userId'],
    data(){
        return{
            saveBtn:true,
        }
    },
    methods:{
        saveAd(){
            axios.post('/save_ads/ads/save',{
                adsId:this.adsId,
                userId:this.userId
            }).then((response)=>{
                this.saveBtn=false
            }).catch((err)=>{
                alert('Error!!')
            })
        }

    }
}
</script>