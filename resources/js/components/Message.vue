<template>
<div class="mt-2">

<!-- Button trigger modal -->
<button type="button" v-if="viewConversation" class="btn btn-primary far fa-envelope" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Send Message
</button>
<a :href="'/message/view'" type="button" v-else class="btn btn-primary">
  view Message
</a>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Send Message to {{sellerName}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <textarea v-model="body" class="form-control" placeholder="please write your message"></textarea>
        <p v-if="successMessage" style="color: green">Your Message has beens sent. </p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @click.prevent="sendMessage()">Send Message</button>
      </div>
    </div>
  </div>
</div>

</div>
</template>

<script>

export default{
    props:['sellerName','userId','receiverId','advertisementId'],

    data(){
        return{
            body:'',
            successMessage: false,
            viewConversation: true,
        }
    },
    methods:{
        sendMessage()
        {
            if(this.body==''){
                alert('please write your message')
                return;
            }
            
            axios.post('/message/send',{
                body:this.body,
                receiverId:this.receiverId,
                userId:this.userId,
                advertisementId:this.advertisementId
            }).then((response)=>{
                console.log(response.data)
                this.body='',
                this.successMessage=true
                this.viewConversation=false
            })
        }
    }
    
}
</script>
