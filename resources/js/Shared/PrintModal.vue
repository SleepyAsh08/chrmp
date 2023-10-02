<template>
    <div class="permissions-modal">
        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl">
                <div class="d-flex justify-content-center">
                    <div class="modal-content" style="width: 100% !important; height: 40% !important; ">
                        <div class="modal-header" style="background-color:#030014">
                            <h4 class="modal-title" style="color: #ffe819; text-align: center !important;">
                                <b>PRINT PREVIEW</b>
                            </h4>
                            <button type="button" class="btn btn-danger" style="font-weight: bold; color: white" data-dismiss="modal" aria-label="Close" @click="closeModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <!--<p>Modal body text goes here.</p>
                        <multiselect v-model="value" :options="options" mode="tags"/>-->
                        <slot></slot>
                        </div>
                        <div class="modal-footer" style="background-color:#090137">
                        <!--<button type="button" class="btn btn-primary" @click="saveChanges">Save changes</button>
                        <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>-->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
  </template>

  <script>
    export default {
      props: {
          //userId: Object,
      },
      data(){
          return{
              //my_id: this.props.userId,
              value: null,
              options: [
                  'Batman',
                  'Robin',
                  'Joker',
                  ],
          }
      },
      mounted(){

      },
      methods: {
        logU_ID(){

        },
        closeModal() {
          this.$emit('close-modal-event');
        },
        saveChanges() {
          this.closeModal();
        },
        loadPermissions(){

        }
      }
    }
  </script>

  <style scoped>
    /* Override default value of 'none' */
    .modal {
      display: block;
    }
  </style>
