import Cookie from 'js-cookie'

export default{
    auth(to , from ,next){
        const Token = Cookie.get('token')
        console.log(Token)
        if(! Token){
next('/')
        }

        next()
    }
}