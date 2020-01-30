<script>
  var BASE_URL = "<?= base_url();?>";
</script>


<script type="text/javascript" class="init">
 
  var myapp = new Vue({
    el:"#myApp",
    
    data(){
      return {
        base_url:BASE_URL,
        user: <?= get_logged_user("json");?>,
        form_data: <?= get_logged_user("json");?>,
        is_show_pass:false,
        pass:"",
        companies:[],
        is_readonly:true,
        con_password:""
      }
    },
    methods:{
        showpass(){
            this.is_show_pass = !this.is_show_pass
        },
        showCompanies(){
            $("#company_modal").modal();
        },
        editProfile(){
          this.is_readonly = !this.is_readonly;
        },
        submit_profile_update(){
          let self = this;
          Swal.fire({
            icon: "warning",
            text: "Are you sure to update?",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.value) {
              if(self.form_data.password == self.con_password){
                 let fdata = new FormData();
                fdata.append("fdata", JSON.stringify(this.form_data));
                axios.post(`${BASE_URL}investor/api_update_profile`, fdata).then(res =>{
                  if(res.data.code == 200){
                    self.user = JSON.parse(res.data.data)
                    self.form_data = JSON.parse(res.data.data)
                    Swal.fire( '', 'Successfully Updated', 'success' ).then(ress =>{
                      if(ress.value){
                        location.reload();
                      }
                    }) 
                  }
                  else if(res.data.code == 205){
                    Swal.fire( '', 'Username or Email address is already used', 'error' )
                  }
                })
              }
             else{
               Swal.fire( '', 'Password does not match', 'error' )
             }
              
            }
          })
        }
        
    },

    computed:{
        getpass(){
            if(this.is_show_pass){
               return this.user.password
            }else{
                return "••••••"
            }
        },
        get_edit_btn_txt(){
          if(this.is_readonly){
            return "Edit";
          }
          return "Cancel";
        }
    },

    mounted(){
        let self = this;
        axios.get(`${BASE_URL}investor/get_my_companies/`).then((resp)=>{
            const res = resp.data;
            if(res.code == 200){
                self.companies =res.data;
            }
        })
    }

  })
</script>
