<template>
	<div>
		
	
        

        <!-- Session Status -->
        

        <form @submit.prevent="submit">
           

            <!-- Email Address -->
            <div>
                Email

                <input id="email" class="block mt-1 w-full" type="email" name="email"  v-model="form.email" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password"  />

                <input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" v-model="form.password" />
            </div>

            <!-- Remember Me -->
           

            <div class="flex items-center justify-end mt-4">
                

                <button class="ml-3" type="submit">
                    Log in
                </button>
            </div>
        </form>
   

	</div>
</template>
<script>
    

    export default {
       
        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>