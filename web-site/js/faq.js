function showFAQ(question_id) {
  var answer = "#" + question_id + "-answer";
  $(answer).toggleClass('showed');
  var icon = "#" + question_id + "-icon";
  $(icon).toggleClass('rotated');
}
