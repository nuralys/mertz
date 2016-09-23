<div class="content">
    <div class="enter-cabinet">
        <div class="enter-cabinet__title">
            Личный кабинет пользователя
        </div>  
       <form class="enter-cabinet__form" action="/users/login" id="UserLoginForm" method="POST" accept-charset="utf-8">
           <div class="enter-input__container login_icon"> 
                <input type="text" name="data[User][username]" placeholder="Введите ваш логин" class="enter-input" maxlength="50" id="UserUsername" required="required">
           </div>    
           <div class="enter-input__container password_icon"> 
                <input name="data[User][password]" id="UserPassword" type="password" placeholder="Введите пароль" class="enter-input" required="required">
           </div> 
           <button class="enter-button button" type="submit">
               Bойти в личный кабинет
           </button>
       </form>
    </div>
 </div>