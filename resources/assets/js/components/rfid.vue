<template>
    <h1>Your RFID code is: {{rfid}}</h1>
</template>
<script>
    import axios from "axios";

    export default {
        data(){
            return{
                rfid: "",
            }
        },
        mounted(){
            axios({ method: "GET", "url": "app/new_rfid"}).then(result => {
                this.rfid = result.data.origin;
            }, error => {
                alert(error);
            });
        },
        methods: { }
    }
</script>