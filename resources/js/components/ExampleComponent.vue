<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Messege</div>

                    <div class="form-group">

                       <table name="cart" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th colspan="2">id</th>
                    <th>First name</th>
                    <th colspan="">Last name</th>

                    <th>Action</th>
                </tr>
            </thead>

                <tr v-for="catagory in catagorys" :key="catagory.id">

                    <td >{{ catagory.id}}</td>
                      <td >{{catagory.data}}</td>
                       

                    <td>


                        </td>



                    </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {

data() {
 return{

    product:{
                     id:'',
                       name:'',
                       slug:''
                    },

     catagorys: [
         {
             messege:''
         }
     ],



 }



},
        mounted() {

    // // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    // var pusher = new Pusher('1bab1c06a2e7d9844925', {
    //   cluster: 'ap2'
    // });

    // var channel = pusher.subscribe('Chatify');
    // channel.bind("App\\Events\\newevent", function(data) {
    //   alert(JSON.stringify(data));

    // });


    //  var messege = this.product.messege




    //     this.products.push({messege: messege,})








     },
     methods: {

         read() {
                axios.get(`/catagory`).then(({ data }) => {
                   console.log(data)
                    this.catagorys= data;

                })
                    .catch((err) => ocnsole.error(err));

            },
     },

     created(){
    Echo.channel('Chatify')
    .listen('newevent', (e) => {

      this.read();


    //   alert(e.messege);

      this.$toast.success({
        title:'login',
        message:e.messege
    })

    });
this.read();
  var messege = this.product.messege


  Echo.join(`Chat`)
    .here((users) => {
    //   console.log(users);

    })

    .joining((user) => {

        console.log(`${user.name} join`);

        this.read();
    })
    .leaving((user) => {
        console.log(`${user.name} leaving`);
        // this.catagorys=$user.name;
           this.read();

    });




}
}

</script>
