<script src="<?php echo base_url(); ?>assets/js/vue.js"></script>
<script src="<?php echo base_url(); ?>assets/js/axios.min.js"></script>

<script>
  var BASE_URL = "<?= base_url();?>";
</script>


<script type="text/javascript" class="init">
  // $(document).ready(function() {
    
  // } );

  var myapp = new Vue({
    el:"#myApp",
    
    data(){
      return {
        base_url:BASE_URL,
        user: <?= get_logged_user("json");?>,
        is_show_pass:false,
        pass:"",
        companies:[]
      }
    },
    methods:{
        showpass(){
            this.is_show_pass = !this.is_show_pass
        },
        showCompanies(){
            
        }
    },

    computed:{
        getpass(){
            if(this.is_show_pass){
               return this.user.password
            }else{
                return "••••••"
            }
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
