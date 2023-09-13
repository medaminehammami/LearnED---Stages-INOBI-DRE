document.addEventListener("DOMContentLoaded", function() {
    const courseDropdown = document.getElementById('course');
    const chapterDropdown = document.getElementById('chapter');
    const subchapterDropdown = document.getElementById('subchapter');
    const courseTitleDiv = document.getElementById('courseTitleDiv');
    const chapterTitleDiv = document.getElementById('chapterTitleDiv');
    const subchapterTitleDiv = document.getElementById('subchapterTitleDiv');
    const courseDetailsDiv = document.getElementById('courseDetailsDiv');
    const QuestionDetailsDiv = document.getElementById('QuestionDetailsDiv');
    const ScoreDetailsDiv = document.getElementById('ScoreDetailsDiv');
    const answerChoicesDropdown = document.getElementById('answerChoicesDropdown');
    const checkAnswerButton = document.getElementById('checkAnswerButton');
    const answerResult = document.getElementById('answerResult');
    const quizzbox = document.getElementById('quizzbox');
    const generateButton = document.getElementById('generateButton');
    const chatbox = document.getElementById('chatbox');
    const userInput = document.getElementById('userInput');
    const sendButton = document.getElementById('sendButton');
    let subchapterData = null;
    var answerverif =null;
    let quizz = null

    courseDropdown.addEventListener('change', function() {
        const selectedCourse = courseDropdown.value;

        chapterDropdown.innerHTML = '<option value="">Select a Chapter</option>';
        subchapterDropdown.innerHTML = '<option value="">Select a Subchapter</option>';

        if (selectedCourse !== "") {
            fetch('get_chapters.php?course=' + encodeURIComponent(selectedCourse))
                .then(response => response.json()) 
                .then(data => {
                    data.chapters.forEach(chapter => {
                        const option = document.createElement('option');
                        option.value = chapter.chapter_title;
                        option.textContent = chapter.chapter_title;
                        chapterDropdown.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    });

    chapterDropdown.addEventListener('change', function() {
        const selectedChapter = chapterDropdown.value;

        subchapterDropdown.innerHTML = '<option value="">Select a Subchapter</option>';

        if (selectedChapter !== "") {
            fetch('get_subchapters.php?chapter=' + encodeURIComponent(selectedChapter))
                .then(response => response.json()) 
                .then(data => {
                    data.subchapters.forEach(subchapter => {
                        const option = document.createElement('option');
                        option.value = subchapter.subchapter_title;
                        option.textContent = subchapter.subchapter_title;
                        subchapterDropdown.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    });

    function populateAnswerChoices(subchapterData) {
        answerChoicesDropdown.innerHTML = '';
        const answerChoicesArray = subchapterData.answer_choices.split('\n');
        
        if (answerChoicesArray[0].startsWith("1.")) {
            answerChoicesArray.push("4." + subchapterData.Answer);
            answerverif = answerChoicesArray[3];
            
        } else if (answerChoicesArray[0].startsWith("1)")) {
            answerChoicesArray.push("4)" + subchapterData.Answer);
            answerverif = answerChoicesArray[3];
        }else {
            answerChoicesArray.push(subchapterData.Answer);
            answerverif = answerChoicesArray[3];
            shuffleArray(answerChoicesArray);
        } 
        
        answerChoicesArray.forEach(choice => {
            const option = document.createElement('option');
            option.value = choice;
            option.textContent = choice;
            answerChoicesDropdown.appendChild(option);
        });
    }

    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }


    subchapterDropdown.addEventListener('change', function() {
        const selectedSubchapter = subchapterDropdown.value;

        if (selectedSubchapter !== "") {

            fetch('get_subchapter_data.php?subchapter=' + encodeURIComponent(selectedSubchapter))
                .then(response => response.json()) 
                .then(data => {
                    subchapterData = data.subchapterData[0];
                    courseDetailsDiv.innerHTML = data.subchapterData[0].subchapter;
                    chapterTitleDiv.innerHTML = data.subchapterData[0].course_title;
                    subchapterTitleDiv.innerHTML = data.subchapterData[0].chapter_title;
                    QuestionDetailsDiv.innerHTML = data.subchapterData[0].question;
                    populateAnswerChoices(data.subchapterData[0]);
                })
        } else {
            console.log('no subchapter fetched');
        }
    });
    checkAnswerButton.addEventListener('click', () => {
        if (subchapterData) {
            const selectedAnswer = answerChoicesDropdown.value;
            const correctAnswer = subchapterData.Answer;

            if (selectedAnswer === answerverif) {
                answerResult.textContent = 'Correct!';
                incrementScoreInPHP();

            } else {
                answerResult.textContent = 'Wrong. The correct answer is: ' + correctAnswer;
            }
        } else {
                answerResult.textContent = 'Select a subchapter first ' ;
        }
    });
    function incrementScoreInPHP() {
        fetch('increment.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({}),
        })
        .then(response => response.json())
        .then(data => {
            ScoreDetailsDiv.innerHTML = data.score;
        })
        .catch(error => {
            console.error('Error incrementing score:', error);
        });
    }

    generateButton.addEventListener('click', () => {
        let userSubject = subchapterData.subchapter;
        let userTitle = subchapterData.course_title;
        if (userSubject.trim() === '') return;
    
        fetch('process_question.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ subchapter: userSubject ,course_title : userTitle }),
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            displayquestion(data.question);
            quizz = data.question ;
        })
        .catch(error => {
            console.error('Error:', error);
        });

    

    });
    
    function displayquestion(question) {
        const quizzElement = document.createElement('div');
        if (question === '') {
            question = 'api error';
        }  
        quizzElement.textContent = question;
        quizzbox.appendChild(quizzElement);
    }
    
    sendButton.addEventListener('click', () => {
        const userMessage = userInput.value;
        if (userMessage.trim() === '') return;

        fetch('process_message.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ message: userMessage ,question : quizz }),
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            
            displayMessage(data.message);
        })
        .catch(error => {
            console.error('Error:', error);
        });

        userInput.value = '';
    });

    function displayMessage(message) {
        const messageElement = document.createElement('div');
        if (message === '') {
            message = 'api error';
        }
        
        messageElement.textContent = message;
        chatbox.appendChild(messageElement);
    }
});
