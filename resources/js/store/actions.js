let actions = {
    SEARCH_HOUSES({commit}, params) {

        axios.post(`/api/houses/search`, params)
            .then(res =>  {
                commit('SET_HOUSES', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
}

export default actions
