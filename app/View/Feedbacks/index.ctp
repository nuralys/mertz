<div class="content">
  <div class="enter-cabinet feedback">
      <div class="enter-cabinet__title feedback-title">
          Обратная связь
      </div>  
     <form class="enter-cabinet__form feedback__form" action="/feedbacks/add" method="post" accept-charset="utf-8">
         <div class="enter-input__container feedback-input__container login_icon"> 
              <input type="text" name="data[Feedback][title]" required="required" placeholder="Введите ваше имя" class="enter-input ">
         </div>    
         <div class="enter-input__container feedback-input__container phone_icon"> 
              <input type="text" name="data[Feedback][phone]" placeholder="Введите ваш телефон" class="enter-input ">
         </div> 
         <textarea name="data[Feedback][body]" id="" cols="30" class="feedback-textarea" placeholder="Текст сообщения..." rows="10"></textarea>
         <button class="feedback-button button" type="submit">
            Отправить
         </button>
     </form>
  </div>
</div>