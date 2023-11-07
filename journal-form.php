<!--partners-->
<div class="container-fluid p-3">
  <h2 style="text-align: center;">Partners</h2>
  <hr>
  <h5 class="px-5"><i>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
      labore et
      dolore magna aliqua."</i></h5>
  <br>
  <!--video1-->
  <div class="videobg">
    <video width="80%" height="auto" poster="/videos/URposter.png" controls>
      <source src="videos/URmaster.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>
  <br>
  <!-- Start of Form current partner-->
  <form action="includes/journal-form.inc.php" method="post">
    <h2 style="text-align: center;">Current Partner</h2>
    <hr>
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <input class="form-check-input mb-2" type="checkbox" value="1"
              aria-label="Checkbox for following text input">
            <div style="padding-left: 10px;">
              <h6>Our Story</h6>
            </div>
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <textarea name="our_story" class="form-control" rows="5" id="comment"
              placeholder="Start you pathway here and describe how you met, indicate whether you are..."></textarea>
            <br>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <input class="form-check-input mb-2" type="checkbox" value="1"
              aria-label="Checkbox for following text input">
            <div style="padding-left: 10px;">
              <h6>My Concerns</h6>
            </div>
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <textarea name="my_concerns" class="form-control" rows="7" id="comment"
              placeholder="Describe what you lke or dont like, any fears..."></textarea>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <input class="form-check-input mb-2" type="checkbox" value="1"
              aria-label="Checkbox for following text input">
            <div style="padding-left: 10px;">
              <h6>Dealing with Stress</h6>
            </div>
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div class="form-check">
              <input name="respectful_communication" class="form-check-input" type="checkbox" value="1"
                id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                We communicate regularly with respect and with little conflict
              </label>
            </div>
            <br>
            <div class="form-check">
              <input name="silence" class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                There is silence, neither of us broaching difficult subjects. I try not to talk about stressors or
                issue. I try to avoid the conflict
              </label>
            </div>
            <br>
            <div class="form-check">
              <input name="profanity" class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                There is name calling, shouting, profanity and physical violence when we try to dissuss stressors
              </label>
            </div>
            <br>
            <label for="comment">If you clicked any of the above please comment</label>
            <textarea name="dealing_with_stress_comment" class="form-control" rows="7" id="comment"
              placeholder="Identify importent issues"></textarea>
            <br>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
            <input class="form-check-input mb-2" type="checkbox" value="1"
              aria-label="Checkbox for following text input">
            <div style="padding-left: 10px;">
              <h6>Story Ending?</h6>
            </div>
          </button>
        </h2>
        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <textarea name="story_ending" class="form-control" rows="7" id="comment"
              placeholder="Describe what you like or don't like, any fears..."></textarea>
          </div>
        </div>
      </div>
    </div>
    <br>
    <!--Past-->
    <h2 style="text-align: center;">Former Partner</h2>
    <hr>
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6"
            aria-expanded="false" aria-controls="collapse6">
            <input class="form-check-input mb-2" type="checkbox" value="1"
              aria-label="Checkbox for following text input">
            <div style="padding-left: 10px;">
              <h6>The Story</h6>
            </div>
          </button>
        </h2>
        <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <textarea name="former_our_story" class="form-control" rows="7" id="comment"
              placeholder="Describe how you met, indicate hether you are..."></textarea>
            <br>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7"
            aria-expanded="false" aria-controls="collapse7">
            <input class="form-check-input mb-2" type="checkbox" value="1"
              aria-label="Checkbox for following text input">
            <div style="padding-left: 10px;">
              <h6>My Concerns</h6>
            </div>
          </button>
        </h2>
        <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <textarea name="former_partner_concerns" class="form-control" rows="7" id="comment"
              placeholder="Describe what you lke or dont like, any fears..."></textarea>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8"
            aria-expanded="false" aria-controls="collapse8">
            <input class="form-check-input mb-2" type="checkbox" value="1"
              aria-label="Checkbox for following text input">
            <div style="padding-left: 10px;">
              <h6>Dealing with Stress</h6>
            </div>
          </button>
        </h2>
        <div id="collapse8" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div>
              <div class="form-check">
                <input name="former_respectful_communication" class="form-check-input" type="checkbox" value="1"
                  id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  We communicate regularly with respect and with little conflict
                </label>
              </div>
              <br>
              <div class="form-check">
                <input name="former_silence" class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  There is silence, neither of us broaching difficult subjects. I try not to talk about stressors or
                  issue. I try to avoid the conflict
                </label>
              </div>
              <br>
              <div class="form-check">
                <input name="former_profanity" class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  There is name calling, shouting, profanity and physical violence when we try to dissuss stressors
                </label>
              </div>
              <br>
              <label for="comment">If you clicked any of the above please comment</label>
              <textarea name="former_dealing_with_stress_comment" class="form-control" rows="7" id="comment"
                placeholder="Identify importent issues"></textarea>
              <br>
            </div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9"
            aria-expanded="false" aria-controls="collapse9">
            <input class="form-check-input mb-2" type="checkbox" value="1"
              aria-label="Checkbox for following text input">
            <div style="padding-left: 10px;">
              <h6>Story Ending</h6>
            </div>
          </button>
        </h2>
        <div id="collapse9" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <textarea name="former_story_ending" class="form-control" rows="7" id="comment"
              placeholder="Describe what you lke or dont like, any fears..."></textarea>
          </div>
        </div>
      </div>
    </div>
    <h6 style="padding: 5%;"><i>Our past relationships sometimes hold clues... consectetur adipiscing elit, sed do
        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
        ullamco laboris nisi ut
        aliquip ex ea commodo consequat. </i>
    </h6>

    <h3 style="text-align: center;">Previous Partners</h3>
    <hr>
    <br>
    <div class="containerfluid px-3">
      <label for="comment">Common themes in your past relationships</label>
      <textarea name="previous_partners" class="form-control" rows="4" id="comment"
        placeholder="Identify importent issues and milestones in your past"></textarea>
      <br>
      <h3 style="text-align: center;">The Role of Partner's Family history</h3>
      <hr>
      <label for="comment">My partner had a history of family dysfunction or difficulty that which I feel causes
        difficulty in relationships:</label>
      <textarea name="partner_family_dysfunctional" class="form-control" rows="5" id="comment"
        placeholder="Describe the family history and whether you tried to support your partner (for example listening and encouraging them to talk about it and seek counselling)"></textarea>
      <br>
      <!--partners family-->
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapsetoxic" aria-expanded="false" aria-controls="collapsetoxic">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>I fear I have had a relationship that was toxic<br></h6>
              </div>
            </button>
          </h2>
          <div id="collapsetoxic" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="toxic_relationship" class="form-control" rows="7" id="comment"
                placeholder="Talk about your feelings and things that you identfy as toxic"></textarea>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a1"
              aria-expanded="false" aria-controls="a1">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>The relationship damaged my self esteem, drained energy.</h6>
              </div>
            </button>
          </h2>
          <div id="a1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="relationship_damage" class="form-control" rows="7" id="comment"
                placeholder="Talk about your feelings and things that you identfy as toxic"></textarea>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a2"
              aria-expanded="false" aria-controls="a2">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>The relationship contributed to my self-esteem, emotional energy.
                </h6>
              </div>
            </button>
          </h2>
          <div id="a2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="relationship_self_esteem" class="form-control" rows="7" id="comment"
                placeholder="Talk about your feelings and things that you identfy as toxic"></textarea>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a3"
              aria-expanded="false" aria-controls="a3">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>My partner attempted to isolate me from family and<br> friends to limit
                  support and increase dependence on the relationship.
                </h6>
              </div>
            </button>
          </h2>
          <div id="a3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="relationship_isolation" class="form-control" rows="7" id="comment"
                placeholder="Talk about your feelings and things that you identfy as toxic"></textarea>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a4"
              aria-expanded="false" aria-controls="a4">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>Our relationship seemed to be based on arguments and negativity.

                </h6>
              </div>
            </button>
          </h2>
          <div id="a4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="relationship_basis" class="form-control" rows="7" id="comment"
                placeholder="Talk about your feelings and things that you identfy as toxic"></textarea>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a5"
              aria-expanded="false" aria-controls="a5">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>My partner was often berating, belittling, and putting me down.
                </h6>
              </div>
            </button>
          </h2>
          <div id="a5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="belittling" class="form-control" rows="7" id="comment"
                placeholder="Talk about your feelings and things that you identfy as toxic"></textarea>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a6"
              aria-expanded="false" aria-controls="a6">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>My partner criticized my attempts to do anything positive or
                  independent.
                </h6>
              </div>
            </button>
          </h2>
          <div id="a6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="criticism" class="form-control" rows="7" id="comment"
                placeholder="Talk about your feelings and things that you identfy as toxic"></textarea>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a7"
              aria-expanded="false" aria-controls="a7">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>My partner blamed me for any negative things and events in our
                  relationship.
                </h6>
              </div>
            </button>
          </h2>
          <div id="a7" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="blamed" class="form-control" rows="7" id="comment"
                placeholder="Talk about your feelings and things that you identfy as toxic"></textarea>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a8"
              aria-expanded="false" aria-controls="a8">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>My partner often accused me of flirting or dating or having a sexual
                  relationship with someone else.
                </h6>
              </div>
            </button>
          </h2>
          <div id="a8" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="accused_of_cheating" class="form-control" rows="7" id="comment"
                placeholder="Talk about your feelings and things that you identfy as toxic"></textarea>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a9"
              aria-expanded="false" aria-controls="a9">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>My partner flirted, dated or had sexual relationships with others.
                </h6>
              </div>
            </button>
          </h2>
          <div id="a9" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="partner_cheated" class="form-control" rows="7" id="comment"
                placeholder="Talk about your feelings and things that you identfy as toxic"></textarea>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#b1"
              aria-expanded="false" aria-controls="b1">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>I usually gave in on everything, even things I found morally,
                  personally<br>
                  or ethically objectionable just to keep my partner happy.
                </h6>
              </div>
            </button>
          </h2>
          <div id="b1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="gave_in" class="form-control" rows="7" id="comment"
                placeholder="Talk about your feelings and things that you identfy as toxic"></textarea>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#b2"
              aria-expanded="false" aria-controls="b2">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>I fear my current or previous relationship is/was abusive
                </h6>
              </div>
            </button>
          </h2>
          <div id="b2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body pl-2">
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="abusive" type="checkbox" value="1"> My partner is/was physically/sexually violent:
                  hitting,
                  pinching, slapping, throwing, choking, raping, etc.
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="brandished_anger" type="checkbox" value="1"> My partner brandished anger: made a
                  fist, threatened, punched
                  holes in walls, throwing objects, etc.
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="barraged_calls" type="checkbox" value="1"> My partner barraged me with texts or calls
                  when I was out.
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="critical_of_clothes" type="checkbox" value="1"> My partner was critical of my
                  clothes, appearance.
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="called_family" type="checkbox" value="1"> My partner called family and friends when
                  he could not reach
                  me.
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="damaged_property" type="checkbox" value="1"> My partner damaged property (such as my
                  car) to prevent me
                  from
                  leaving, or clothes to prevent me from wearing them.
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="withheld_finances" type="checkbox" value="1"> My partner withheld finances, assets
                  (such as car, phone,
                  other
                  necessities) cutting off support if I left or on suspicion I was planning to leave.
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="dissatisfying" type="checkbox" value="1"> I sense my relationship is/was
                  dissatisfying for me and/or my
                  partner.
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="not_reciprocated" type="checkbox" value="1"> I don not feel it was reciprocal and I
                  gave more than I got
                  (to
                  the household, to my partner and to the nurturing and repairing of the relationship when there was
                  conflict).
                </label>
              </div>
              <label for="comment">If you clicked any of the above please comment</label>
              <textarea name="comment_on_toxic_relationship" class="form-control" rows="4" id="comment"
                placeholder="Identify importent issues"></textarea>
              <br>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="accordionExample p-2">
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c1"
                aria-expanded="false" aria-controls="c1">
                <input class="form-check-input mb-2" type="checkbox" value="1"
                  aria-label="Checkbox for following text input">
                <div style="padding-left: 10px;">
                  <h6>I sense my relationship is dissatisfying for me and/or my partner.<br></h6>
                </div>
              </button>
            </h2>
            <div id="c1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="checkbox" style="line-height: 1.6;">
                  <label><input name="no_reciprocation" type="checkbox" value="1"> I do not feel it was reciprocal and I
                    gave more than I got
                    (to
                    the
                    household, to my partner and to the nurturing and repairing of the relationship when there was
                    conflict).
                  </label>
                </div>
                <div class="checkbox" style="line-height: 1.6;">
                  <label><input name="no_attention" type="checkbox" value="1"> My partner paid more attention to his
                    friends or hobbies or
                    ex-partners
                    than to
                    me.
                  </label>
                </div>
                <div class="checkbox" style="line-height: 1.6;">
                  <label><input name="felt_insecure" type="checkbox" value="1"> I felt insecure in the relationship, like
                    it could end at
                    any
                    time,
                    with
                    any small mistake I made.
                  </label>
                </div>
                <div class="checkbox" style="line-height: 1.6;">
                  <label><input name="more_intimacy" type="checkbox" value="1"> I yearned for more intimacy (closeness,
                    togetherness,
                    affection), not
                    necessarily sexual intimacy.
                  </label>
                </div>
                <div class="checkbox" style="line-height: 1.6;">
                  <label><input name="more_one_on_one" type="checkbox" value="1"> I yearned for more one-on-one time with
                    my partner.
                </div>
                <br>
                <textarea name="dissatisfying_comment" class="form-control" rows="4" id="comment"
                  placeholder="Talk about your feelings and things that you need to look at"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <!--Stressors-->
      <h2 style="text-align: center;">Stressors </h2>
      <hr>
      <h4 style="padding: 5%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
        incididunt </h4>
      <!--video2-->
      <div class="videobg">
        <video width="80%" height="auto" poster="/videos/URposter.png" controls>
          <source src="videos/URmaster.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
      <br>
      <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
      </h6>
      <br>
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#d1"
              aria-expanded="true" aria-controls="d1">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>Medical issues including mental health, substabce use or abuse</h6>
              </div>
            </button>
          </h2>
          <div id="d1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="medical_issues" class="form-control" rows="5" id="comment"
                placeholder="Describe how this appies to your, your partner, your children or other close family members or friends you are supporting"></textarea>
              <br>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#d2"
              aria-expanded="false" aria-controls="d2">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>Legal Issues</h6>
              </div>
            </button>
          </h2>
          <div id="d2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="legal_issues" class="form-control" rows="5" id="comment"
                placeholder="Describe how this appies to you, your partner or your children"></textarea>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#d3"
              aria-expanded="true" aria-controls="d3">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>Financial Issues</h6>
              </div>
            </button>
          </h2>
          <div id="d3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="financial_issues" class="form-control" rows="5" id="comment"
                placeholder="Describe ..."></textarea>
              <br>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#d4"
              aria-expanded="false" aria-controls="d4">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>Sexual/intimacy</h6>
              </div>
            </button>
          </h2>
          <div id="d4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="sexual_intimacy" class="form-control" rows="5" id="comment"
                placeholder="Describe..."></textarea>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#d5"
              aria-expanded="true" aria-controls="d5">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>Family Income and Social Status</h6>
              </div>
            </button>
          </h2>
          <div id="d5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="family_income" class="form-control" rows="5" id="comment"
                placeholder="Describe..."></textarea>
              <br>
            </div>
          </div>
        </div>
      </div>
      <br>
      <!--Myself-->
      <h2 style="text-align: center;">Myself </h2>
      <hr>
      <h4 style="padding: 0% 0%; text-align: left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
        eiusmod tempor
        incididunt </h4>
      <br>
      <!--video2-->
      <div class="videobg">
        <video width="80%" height="auto" poster="/videos/URposter.png" controls>
          <source src="videos/URmaster.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        <br><br>

      </div>
      <hr>
      <div style="text-align: center;">
        <h3>I am concerned about myself</h3>
        <h6 style="padding: 0% 0%; text-align: left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et
          dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
          ex
        </h6>
        <p> click all that apply</p>
      </div>
      <div class="container-fluid"
        style="border-style: solid; border-radius: 20px; border-color: darkblue; padding: 5%; line-height: 3;">
        <div class="checkbox" style="line-height: 2.5;">
          <label><input name="feeling_stuck" type="checkbox" value="1">&nbsp; I feel stuck, I have held myself back
            from pursuing goals,
            dreams
          </label>
        </div>
        <div class="checkbox" style="line-height:  2.5;">
          <label><input name="no_medical_physical_needs" type="checkbox" value="1">&nbsp; I have not attended to my
            medical,
            physical, spiritual, emotional
            needs
            or family/friends because I give my energy to my partner and/or relationship, the household, the kids
            and
            other stressors
          </label>
        </div>
        <div class="checkbox" style="line-height:  2.5;">
          <label><input name="more_then_one_toxic_relationship" type="checkbox" value="1">&nbsp; I have been in more than
            one
            abusive/toxic/dissatisfying
            relationship
          </label>
        </div>
        <div class="checkbox" style="line-height:  2.5;">
          <label><input name="returned" type="checkbox" value="1">&nbsp; I have returned to an
            abusive/toxic/dissatisfying relationship (either once, or repeatedly) even though I knew the relationship
            would not improve
          </label>
        </div>
        <div class="checkbox" style="line-height:  2.5;">
          <label><input name="repetitive_partners" type="checkbox" value="1">&nbsp; I find myself falling for the same
            kind of partner (people with
            criminal records, suspended licenses, addictions, limited means or resources). My friends and I joke
            about
            how I seem “to attract” certain partners, or how I “am attracted” to them.
          </label>
        </div>
        <div class="checkbox" style="line-height:  2.5;">
          <label><input name="giving_all_resources" type="checkbox" value="1">&nbsp; I willingly give my resources (time,
            money, expertise) to my partner. Even if my resources are scarce, I give to my partner, who is less
            willing or able to reciprocate. I
            inconvenience myself and/or my kids (describe):
          </label>
        </div>
      </div>
      <hr>
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#d6"
              aria-expanded="true" aria-controls="d6">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>Because of my concerns, I am accessing<br>
                  professional counselling
                  services, etc. </h6>
              </div>
            </button>
          </h2>
          <div id="d6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="professional_counselling" class="form-control" rows="5" id="comment"
                placeholder="indicate if you are accessing private counselling, Owmens services, Childrens programs or agencies... LINKS"></textarea>
              <br>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#d7"
              aria-expanded="true" aria-controls="d7">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>I have a history of adverse childhood experiences.<br><small><i>ACES are potentially traumatic
                      experiences between the ages of 10-17</i>
                  </small> </h6>
              </div>
            </button>
          </h2>
          <div id="d7" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body px-5">
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="experiencing_violence" type="checkbox" value="1">
                  experiencing violence, abuse,
                  neglect
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="home_violence" type="checkbox" value="1"> witnessing violence in the home
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="family_suicide" type="checkbox" value="1"> having a family member die by
                  suicide
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="death_of_parent" type="checkbox" value="1"> illness, death of a parent
                </label>
              </div>
            </div>
            <textarea name="childhood_experiences_comment" class="form-control" rows="5" id="comment"
              placeholder="If you have selected any of the above describe"></textarea>
            <br>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#d8"
              aria-expanded="true" aria-controls="d8">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>Aces also include the following aspects that undermine a sense<br> ... a household</i>
                  </small> </h6>
              </div>
            </button>
          </h2>
          <div id="d8" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body px-5">
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="substance_use" type="checkbox" value="1"> Substance user problems
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="mental_health" type="checkbox" value="1"> Mental health problems
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="instability" type="checkbox" value="1"> Instability due to parental
                  absence/separation
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="moving_around" type="checkbox" value="1"> Moving around a lot
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="family_in_jail" type="checkbox" value="1"> A household member being in
                  jail/prison
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="mom_in_toxic_relationship" type="checkbox" value="1"> A stressed mom who dealt with
                  living
                  with a toxic, abusive
                  partner;
                  community upheaval (such community violence, fleeing another country, living through a war.)
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="prematurity" type="checkbox" value="1"> Prematurity or other healt
                  conditions that result in invasive medical procedures
                  requiring separation from parent of caregiver
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="adopted" type="checkbox" value="1"> You are adopted
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="bullying" type="checkbox" value="1"> Experienced bullying
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="teen_dating_violence" type="checkbox" value="1"> Teen dating violence or personal
                  violence
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="community_violence" type="checkbox" value="1"> Witness community violence
                </label>
              </div>
              <div class="checkbox" style="line-height: 1.6;">
                <label><input name="other_trauma" type="checkbox" value="1"> Other trauma or circumstance
                  from
                  childhood, adolescence or
                  adulthood not listed above, that you believe is relevant
                </label>
              </div>
              <textarea name="trauma_comment" class="form-control" rows="5" id="comment"
                placeholder="If you have selected any of the abouve discribe"></textarea>
              <br>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <h6 style="padding: 0% 5%; text-align: left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
        eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
        ex
      </h6>
      <br>
      <h2 style="text-align: center;">"I keep asking myself"</h2>
      <br>
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f7"
              aria-expanded="true" aria-controls="f7">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>"Why do I keep doing this?"
                </h6>
              </div>
            </button>
          </h2>
          <div id="f7" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body px-5">
              <textarea name="why_do_i_keey_doing_this" class="form-control" rows="5" id="comment"
                placeholder="If you have selected any of the abouve discribe"></textarea>
              <br>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#e8"
              aria-expanded="true" aria-controls="e8">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>"Why am I like this?"</h6>
              </div>
            </button>
          </h2>
          <div id="e8" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <textarea name="why_am_i_like_this" class="form-control" rows="5" id="comment"
              placeholder="Think of reasons you are feeling this way"></textarea>
            <br>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#e6"
              aria-expanded="true" aria-controls="e6">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>“How did I get here
                  (again)?”</h6>
              </div>
            </button>
          </h2>
          <div id="e6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <textarea name="how_did_i_get_here" class="form-control" rows="5" id="comment"
                placeholder="Outline what you think the factors are"></textarea>
              <br>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#e7"
              aria-expanded="true" aria-controls="e7">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6> “What is it about me that keeps me in a mean marriage/relationship?”</h6>
              </div>
            </button>
          </h2>
          <div id="e7" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body px-5">
              <textarea name="what_keeps_me" class="form-control" rows="5" id="comment"
                placeholder="If you have selected any of the abouve discribe"></textarea>
              <br>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#x8"
              aria-expanded="true" aria-controls="x8">
              <input class="form-check-input mb-2" type="checkbox" value="1"
                aria-label="Checkbox for following text input">
              <div style="padding-left: 10px;">
                <h6>“What is it about me that keeps me stuck?”</i>
                  </small> </h6>
              </div>
            </button>
          </h2>
          <div id="x8" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body px-5">

              <textarea name="why_am_i_stuck" class="form-control" rows="5" id="comment"
                placeholder="If you have selected any of the abouve discribe"></textarea>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <label for="comment">Comment:</label>
    <textarea name="general_comment" class="form-control" rows="7" id="comment"
      placeholder="Enter your specific instrustions"></textarea>
    <br>
    <button type="submit">Submit Form</button>
  </form>
</div>

<!----------------------- End Of Form ------------------------->

<!--video-->
<div class="videobg">
  <video width="80%" height="auto" poster="/videos/URposter.png" controls>
    <source src="videos/URmaster.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
</div>
<hr>
<div class="row p-3">
  <div class="col-sm-8">
    <h6>These Questions that "Drive Seeking" signal readiness to change your trajectory. To shift your focus
      away
      from solving your partner's (or parent's) issues, addictions, family drama/trauma. Away from trying to
      fulfill their needs, calm their temper. Real change comes when you shine a light on your own
      repetitive
      thoughts and behaviors that cause you to continue to choose more of the same. </h6>
  </div>
  <div class="col-sm-4">
    <div><img src="images/lori.png" class="img-rounded image-reponsive" alt="Lori Image" width="100%" height="auto">
    </div>
  </div>
</div>
<br>
</div>
</div> <!--end of wrapper-->