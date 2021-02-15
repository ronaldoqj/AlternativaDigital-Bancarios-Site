import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader
import Vue from 'vue'
import Vuetify from 'vuetify'
//import Vuetify from 'vuetify/lib'
import 'vuetify/dist/vuetify.min.css'

/**
 * Custom icons
 */
import iconOnlyLetterFacebook from '../components/_custom-icons/only-letters/facebook.vue'
import iconOnlyLetterInstagram from '../components/_custom-icons/only-letters/instagram.vue'
import iconOnlyLetterPodcast from '../components/_custom-icons/only-letters/podcast.vue'
import iconOnlyLetterTwitter from '../components/_custom-icons/only-letters/twitter.vue'
import iconOnlyLetterWhatsapp from '../components/_custom-icons/only-letters/whatsapp.vue'
import iconOnlyLetterYoutube from '../components/_custom-icons/only-letters/youtube.vue'

Vue.use(Vuetify)

const opts = {
    icons: {
        iconfont: 'mdi', // default - only for display purposes
        values: {
            iconOnlyLetterFacebook: { // name of our custom icon
                component: iconOnlyLetterFacebook // our custom component
            },
            iconOnlyLetterInstagram: {
                component: iconOnlyLetterInstagram
            },
            iconOnlyLetterPodcast: {
                component: iconOnlyLetterPodcast
            },
            iconOnlyLetterTwitter: {
                component: iconOnlyLetterTwitter
            },
            iconOnlyLetterWhatsapp: {
                component: iconOnlyLetterWhatsapp
            },
            iconOnlyLetterYoutube: {
                component: iconOnlyLetterYoutube
            }
        },
    },
}

export default new Vuetify(opts)