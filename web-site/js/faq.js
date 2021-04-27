function showFAQ(question_id) {
  var answer = "#" + question_id + "-answer";
  $(answer).toggleClass('showed');
  var text = "#" + question_id + "-text";
  $(text).toggleClass('changed');
  var icon = "#" + question_id + "-icon";
  $(icon).toggleClass('rotated');
}
