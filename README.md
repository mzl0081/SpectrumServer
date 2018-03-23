# Spectrum Server APIs



## case
    
### Parameters
- userName

### Examples

	GET http://localhost/SpectrumServer/API/case/?userName=bzl0048
    {
      "cases":
      [
          {
              "caseID": "1",
              "caseName":"Case study 10: Oppositional Defiant Disorder",
              "caseDescription":"The teacher does not know how to handle the student who has oppositional defiant disorder. In this case, the teacher does not pay much attention to Willy. When Willy's behavior problems appear, the teacher doesn't know how to help Willy and solve the problem by herself. She instead sends him to the positive behavior teacher to correct his behavior. For this scenario, I would like for teachers to be aware of this kind of situation and be encouraged to learn this disorder.",
              "caseVideoName":"case_MZL_10",
              "caseType": "1",
              "caseCoverPic":"case_video_cover_10",
              "caseVideoScreenshot":"case_video_screenshot_10",
              "teachersNotes":
              [
                  {
                      "noteID":"1",
                      "noteVideo":"case_MZL_10_TN",
                      "noteCover":"teachers_note_cover_10"
                  }
              ],
              "questions":
              [
                  {
                      "questionID":"1",
                      "questionContent": "Considering Willy's behavioral problems, should he be immediately sent to the Positive Behavior teacher?",
                      "options":
                      [
                          {
                              "optionID":"1",
                              "option": "Yes, Willy should be sent to the Positive Behavior teacher.",
                              "isCorrect": false,
                              "isSelect": false
                          },
                          {
                              "optionID":"2",
                              "option": "No, Willy shouldn't be sent to the Positive Behavior teacher.",
                              "isCorrect": true,
                              "isSelect": false
                          }
                      ],
                      "explanation":"One successful example shows that teachers should pay attention and show respect to students who have oppositional defiant disorder. Because most of time students seek attention from teachers. Sending them to the positive behavior teachers will hurt their confidence and self-esteem. In this case, teachers shouldn't send them immediately to special department when they have behavior problems. And teachers also should know when to show much attention and less attention. For example, show less attention when they don't improve their behavior."
                  }
              ]
          }
      ]
      }
      
## AllTopics
### Parameters
> No parameters
### Return
> All Discussions associate with userID and Time.
### Examples

## Login
### Parameters

### Return

### Examples

## NewAttempt
### Parameters

### Return

### Examples

## NewTopic
### Parameters

### Return

### Examples

## Register/checkUsername
### Parameters

### Return

### Examples

## Register/signup
### Parameters

### Return

### Examples

## Replies
### Parameters

### Return

### Examples

## ReplyTopic
### Parameters

### Return

### Examples

## ResetPassword
### Parameters

### Return

### Examples

## Topic
### Parameters

### Return

### Examples

## User
### Parameters

### Return

### Examples






