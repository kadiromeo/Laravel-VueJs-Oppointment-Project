<template>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input v-model="name" type="text" class="form-control" placeholder="Ad Soyad">
                </div>
            </div>

              <div class="col-md-6">
                <div class="form-group">
                    <input v-model="email" type="email" class="form-control" placeholder="Email">
                </div>
            </div>

              <div class="col-md-6">
                <div class="form-group">
                    <input v-mask="'####-##'" v-model="phone" type="text" class="form-control" placeholder="Telefon">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input @change="selectDate" v-model="date" class="form-control" type="date">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
            <ul class="select-time-ul">

                <li v-for="(item, workingHours) in items" :key="workingHours" class="select-time">
                    <input type="radio" v-model="workingHour" v-bind:value="item.id">
                  <span>  {{item.hours}} </span>
                </li>

            </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <textarea v-model="text" class="form-control" cols="30" rows="10"> </textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-3">
            <button v-on:click="store" class="btn btn-primary">Randevu Oluştur</button>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            workingHour:'',
            name:'',
            email:'',
            phone:'',
            text:'',
            date:new Date().toISOString().slice(0,10),
            workingHours:[]
        }
    },

    mounted() {
        axios.get(`http://127.0.0.1:8000/api/working-hours`)
        .then((res)=>{
            this.workingHours = res.data;
        })
    },

    methods: {
       store:function(){
        console.log('tıklandı');
       },

       selectDate:function(){
        axios.get(`http://127.0.0.1:8000/api/working-hours/${this.date}`)
        .then((res)=>{
            this.workingHours = res.data;
        })
       }

    }
}
</script>



