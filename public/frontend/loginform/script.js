Vue.component('signUpForm',
{
	template:'#signUpForm',


	data() {
		return{
            msg:[],
			password:'',
			confirmPassword:'',
			email:'',
		  disableSubmitButton:true,
		}
	},

	watch:{
		email(value){

			
			
			this.email=value;
			
			this.check_email(value);

		},
		password(value){
			
			this.password=value;
			this.checkPassword(value);
		},
		confirmPassword(value){
		
			this.confirmPassword=value;
			this.checkConfirmPassword(value);
		}

	},

	methods:{
		changeTotermandcondition(){
			this.$emit('change','changeTotermandcondition');
		},

		check_email(value){	  

			// console.log(value);


             if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value))
             {




  
              this.msg['email']='';

             } else{

            // console.log('ii'+value);

               this.msg['email']='Keep Typing.. We are waiting For Current Email';
           }

		    },
		    checkPassword(value){

		    	this.passwordLengthCheck(value);
		    },

           checkConfirmPassword(value){
           
             if(this.passwordLengthCheck(value)){
             	if(value== this.password){
             		this.msg['password']='';
             		this.disableSubmitButton=false;

             	}else{
             		this.msg['password']="Password does not match, Please try again";
             		
             	}
             }
           },

           passwordLengthCheck(passwordToCheck){
           	remainingChars= 6-passwordToCheck.length;
		    	
                 
		    	if(passwordToCheck.length<6){
		    		this.msg['password']='Password must contain 6 characters' +
		    		remainingChars+'more to go ...';

		    	}else{
		    		this.msg['password']='';

		    		return true;
		    	}
           },

           submit(){
           	alert('You are succesfully login');
           }
            



	}

});


new Vue({
	el:'#app',
	data:{
		componentName:'signUpForm'
	},
	methods:{
		change(newComp){
			this.componentName= newComp;
		}
	}
})