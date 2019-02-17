import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const state = {
    footerOffset: 0,
    showMenu: false,
    loading: false,
    isMobile: true,
    signUpModalStatus: null,
}

const mutations = {
    SET_FOOTER_OFFSET (state, height) {
        state.footerOffset = height
    },
    SET_LOADING (state, bool) {
        state.loading = bool
    },
    SET_DEVICE_TYPE (state, type) {
        state.isMobile = type
    },
    SET_SIGNUP_MODAL (state) {
        state.signUpModalStatus = !state.signUpModalStatus
    },

}

const actions = {
    incrementAsync ({ commit }) {
        setTimeout(() => {
            commit('INCREMENT')
        }, 200)
    },
}

const getters = {

}

const store = new Vuex.Store({
    state,
    mutations,
    actions,
    getters
})

export default store
