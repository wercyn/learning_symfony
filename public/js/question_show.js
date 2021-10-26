

function question_vote(){
    const vote_container = document.querySelectorAll('.js-vote-arrows')

    if(vote_container.length){
        vote_container.forEach((container)=>{
            const vote_links = container.querySelectorAll('a[data-direction]');
            if(vote_links.length){
                vote_links.forEach((link) => {
                    link.addEventListener('click', (e) => {
                        e.preventDefault();

                        const direction = link.dataset.direction;

                        fetch('/comments/10/vote/'+direction, {method: 'POST'})
                            .then((response) =>{
                                return response.json()
                            })
                            .then((data)=>{
                                const total_vote = container.querySelector('.js-vote-total')

                                total_vote.innerHTML = data.votes;
                            })
                    })
                })
            }
        })
    }


}


window.addEventListener('DOMContentLoaded', function(){
    question_vote();
})