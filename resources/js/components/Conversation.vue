<template>

<div class="row">


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Report User</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" @click.prevent="successMessage=false" aria-label="Close" ></button>
	      </div>
	      <div class="modal-body">

		        <div class="form-group">
		        	<label>Select reason</label>
		        	<select class="form-control" v-model="selectedReason" name="reason">
		        		<option value="fraud">Fraud</option>
		        		<option value="Scammer">Scammer</option>
		        		<option value="Abusive">Abusive</option>
		        		<option value="Other">Other</option>
		        	</select>
		        </div>

		        <div class="form-group">
		        	<label>Your Message</label>
		        	<textarea name="message" v-model="messageReport" class="form-control"></textarea>
                   
		        </div>
            
                <p v-if="successMessage" style="color: green">Your message successfully send!!!
                    <br>
                    We will send you an update regarding this through your email 
                </p>
                
                
	      </div><!--modal-body-->
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click.prevent="successMessage=false">Close</button>
	        <button type="button" class="btn btn-info text-white" @click.prevent="reportUser()">Send</button>
	      </div>
    
    </div><!--modal content-->
  </div>
</div>






    <div class="col-md-3">
        
         <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">List of Users</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(user,index) in users" :key="index">
                    <td href="" @click.prevent="showMessage(user.id)">
                       <img :src="'/storage/'+ (user.avatar).substring(7)" class="rounded-circle" width="30">
                       {{user.name}}

                    </td>
                </tr>
            </tbody>
        </table>       

    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header ">
                
                <div class="row" >
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-7" >
                        <div v-for="(user,index) in users" :key="index">
                            <span v-if="user.id == chatuser">
                                <a :href="'/user/user/profile/'+user.id" target="_blank">
                                <img :src="'/storage/'+ (user.avatar).substring(7)" class="rounded-circle" width="30">
                                    {{user.name}}
                                </a>    
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                 style="float: right">Report this user</button> 
                            </span>
                        </div>
                    </div>
                    <div>
                   
                    </div>
                </div>

    

            </div>
            <div class="card-body chat-msg" v-chat-scroll>
                <ul class="chat" v-for="(message,index) in messages" :key="index">
                                              <!--if this chatbelongtoauth is false-->
                    <li class="sender clearfix" v-if="!message.chatBelongToAuth"><!--came from message model-->
                       
                        <div class="chat-body2 clearfix">
                            <div class="header clearfix">
                                <strong class="primary-font"></strong>
                                <small class="right text-muted">
                                    <span>
                                        {{moment(message.created_at).format('MM-DD-YYYY')}}
                                    </span>
                                </small>
                            </div>
                            <p>
                               <a :href="'/product/products/'+message.ads.id+'/'+message.ads.slug" target="_blank"
                                    v-if="message.ads != null">
                                    {{message.ads.name}}
                                     <img :src="'/storage/'+ (message.ads.feature_image).substring(7)" width="50">                          
                               </a>
                            </p>
                            <p>
                                {{message.body}}
                            </p>
                        </div>
                    </li>
                                       <!--else  chatbelongtoauth is true-->
                    <li class="buyer clearfix" v-if="message.chatBelongToAuth">
                        
                        <div class="chat-body clearfix">
                            <div class="header clearfix">
                                <strong></strong>
                                <small class="left text-muted">
                                    <span>
                                        {{moment(message.created_at).format('MM-DD-YYYY')}}
                                    </span>
                                </small>
                            </div>
                             <p>
                                <a :href="'/product/products/'+message.ads.id+'/'+message.ads.slug" target="_blank"
                                    v-if="message.ads != null">
                                    {{message.ads.name}}
                                     <img :src="'/storage/'+ (message.ads.feature_image).substring(7)" width="70">                          
                               </a>
                            </p>
                            <p>
                               {{message.body}}
                            </p>
                            
                        </div>
                    </li>

                    <li class="sender clearfix">
                        <span class="chat-img left clearfix mx-2"> </span>
                    </li>

                </ul>
            </div><!--card-header-->

            <div class="card-footer">
                <div class="input-group">
                    <input 
                        v-model="body"
                        v-on:keyup.enter="sendMessage()" 
                        type="text"
                        class="form-control input-sm" 
                        maxlength="112"
                        placeholder="please write your message"
                    />
                    <span>
                        <button class="btn btn-primary" 
                        @click.prevent="sendMessage()">Send
                        </button>
                   </span>
                </div>
            </div><!--footer-->

        </div><!--card-->
    </div>
</div>
</template>


<script>

import moment from 'moment';


export default{
    data(){
        return{
            users:[],
            unread:[],
            messages:[],
            selectedUserId:'',
            body:'',
            moment:moment,
            messageReport:'',
            selectedReason:'',
            successMessage: false,

        }
    },//end data

    computed:{
        //check who is the name of chatting with authenticated user
        chatuser(){
           var result='';
            for(let i = 0;i < this.messages.length; i++ ) {
                  if(this.messages[i].user_id == this.selectedUserId){
                       result= this.messages[i].user_id
                       
                       break;
                       }
            }
            return result
        },
    }, //end computed  
    
    mounted(){
            axios.get('/message/chat_with_user').then((response)=>{
            this.users = response.data
        })
            //1000 means every 1 seconds. every 1 second the showmessage method will load.
            setInterval(() => {
                if(this.selectedUserId != ''){
                    this.showMessage(this.selectedUserId)
                    
                }
            }, 1000);

    },//mounted

    methods:{
        showMessage(userId){
            this.selectedUserId = userId
                axios.get('/message/show_message/users/'+userId).then((response)=>{
                    this.messages = response.data
                })

        },
        sendMessage(){
            axios.post('/message/start_conversation',{
                body:this.body,
                receiverId: this.selectedUserId
            }).then((response)=>{
              this.messages.push(response.data)//. push function is used when you want to add an value in array
              this.body=''
            })
        },
        reportUser(){
            axios.post('/report/report/user',{
                messageReport:this.messageReport,
                selectedReason:this.selectedReason,
                reportUserId:this.chatuser
            }).then((response)=>{
                this.successMessage=true
                this.messageReport=''
                this.selectedReason=''
            })    
        }
        
    }//methods
}
</script>
<style>
    .chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 30px;
    padding-bottom: 5px;
    margin-top: 10px;
    width: 100%;
    height: 7px;
}


.chat li .chat-body p
{
    margin: 0;
}

.chat li .chat-body2 p
{
    margin: 0;
}

.chat-msg
{
    overflow-y: scroll;
    height: 350px;
}
.chat-msg .chat-img
{
    width: 50px;
    height: 50px;
}
.chat-msg .img-circle
{
    border-radius: 50%;
}
.chat-msg .chat-img
{
    display: inline-block;
}
.chat-msg .chat-body
{
    display: inline-block;
    max-width: 80%;
    background-color: #FFC195;
    border-radius: 12.5px;
    padding: 5px;

}
.chat-msg .chat-body2
{
    display: inline-block;
    max-width: 80%;
    background-color:#ccc;
    border-radius: 12.5px;
    padding: 5px;
}
.chat-msg .chat-body strong
{
  color: #0169DA;
}

.chat-msg .buyer
{
    text-align: right ;
    float: right;
}
.chat-msg .buyer p
{
    text-align: left ;
}
.chat-msg .sender
{
    text-align: left ;
    float: left;
}
.chat-msg .left
{
    float: left;
}
.chat-msg .right
{
    float: right;
}

.clearfix {
  clear: both;
}


</style>