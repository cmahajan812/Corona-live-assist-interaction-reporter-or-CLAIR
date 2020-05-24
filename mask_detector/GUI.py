import tkinter as tk
from tkinter import *

import tensorflow as tf
import cv2
from keras.models import load_model
import numpy as np
from keras.preprocessing import image
from PIL import Image

window=tk.Tk()
window.title("Mask-Detector")

l1 = tk.Label(window, text="--:Welcome To Face-Mask Detector:--", font=('Comic Sans MS',20), bg='#ebf83f').pack(padx=20, pady=10)

l2 = tk.Label(window, text="Click To Know If You Are Missing Something Or Not  ", font=('Comic Sans MS',15),bg='#4bceb3' ,fg='DarkRed').pack(padx=0, pady=75)

def mask():
    model=tf.keras.models.load_model('Mask_detector_model.h5')

    #loading the cascades
    face_cascade=cv2.CascadeClassifier('haarcascade_frontalface_alt.xml')

    #webcam face recognition
    video_capture=cv2.VideoCapture(0)
    while True:
        _,frame=video_capture.read()
        faces=face_cascade.detectMultiScale(frame,1.3,5)
        
        for (x,y,w,h) in faces:
            cv2.rectangle(frame,(x,y),(x+w,y+h),(0,255,255),2)
            face=frame[y:y+h,x:x+w]
            cropped_face=face
        
            if type(face) is np.ndarray:
                face=cv2.resize(face,(224,224))
                im=Image.fromarray(face,'RGB')
                img_array=np.array(im)
                img_array=np.expand_dims(img_array,axis=0)
                pred=model.predict(img_array)
                print(pred)
                
                if(pred[0][0]>0.5):
                    prediction='Mask'
                    cv2.putText(cropped_face,prediction,(50,50),cv2.FONT_HERSHEY_COMPLEX,1,(0,255,0),2)
                else:
                    prediction='No Mask'
                    cv2.putText(cropped_face,prediction,(50,50),cv2.FONT_HERSHEY_COMPLEX,1,(0,0,255),2)
            else:
                cv2.putText(frame,'No Face Found',(50,50),cv2.FONT_HERSHEY_COMPLEX,1,(255,0,0),2)
                
        cv2.imshow('Video',frame)
        if cv2.waitKey(1) & 0xFF==ord('q'):
            break
    video_capture.release()
    cv2.destroyAllWindows()

b1=tk.Button(window,text="Detect With ME!!",font=("Algerian",15), bg='#154360',fg='white', command=mask ).pack(padx=20,pady=70)

l3 = tk.Label(window, text="Wear Mask !!! Stay Protected From CoronaVirus ", font=('Comic Sans MS',25),bg='#4bceb3' ,fg='DarkRed').pack(padx=40, pady=125)



window.configure(background = '#4bceb3')
window.geometry("1000x700")
window.mainloop()




