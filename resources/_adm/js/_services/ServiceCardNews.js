
// export function PaginationCardGet(payload) {

//     console.log('payload Get', payload);

//     let header = {
//         headers: {
//             'X-CSRF-TOKEN': payload.csrf
//         }
//     }

//     return axios.get(payload.url, header);
// }

export function PaginationCardPost(payload) {

    const header = {
        headers: {
            'X-CSRF-TOKEN': payload.csrf
        }
    }
    const data = {
        "page": 1,
        "typeOfNews": payload.typeOfNews
    }

    /** Set opcional parameters */
    if ( payload.hasOwnProperty("page") ) { data.page = payload.page; }
    if ( payload.hasOwnProperty("itemsPerPage") ) { data.itemsPerPage = payload.itemsPerPage; }

    return axios.post(payload.url, data, header);
}
