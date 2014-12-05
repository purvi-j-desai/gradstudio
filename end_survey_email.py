import smtplib
import re
import time

from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

link = "http://d.ucsd.edu/gradstudio/end_survey.php?user_id="

# look at changing from name

# ask cat
email_subject = "GradStudio: Final Steps"

email_body_1 = open("final_email1.html").read()

email_body_2 = open("final_email2.html").read()

fromaddr = 'Grad Studio <GradStudioProject@gmail.com>'



data = open('end_survey_emailids.txt').read()[:-1]
people_to_remind = {}

print data
for s in data.split('\n'):
    tokens = s.split()
    people_to_remind[tokens[1]] = (tokens[0])

print people_to_remind

username = 'GradStudioProject@gmail.com'
password = '********'
server = smtplib.SMTP('smtp.gmail.com:587')
server.ehlo()
server.starttls()
server.login(username,password)

count = 0
for people in people_to_remind.items():
    toaddrs  = people[0]
    msg = MIMEMultipart('alternative')
    msg['Subject'] = email_subject
    msg['From'] = fromaddr
    msg['To'] = toaddrs
    send_link = link + people[1]
    print people[0], " gets link ", send_link, "\n"
    email_link = "<a href=\"%s\">%s</a>" %(send_link, send_link)
    part_html = MIMEText(email_body_1 + email_link + email_body_2, 'html')
    msg.attach(part_html)
    server.sendmail(fromaddr, toaddrs, msg.as_string())
    time.sleep(60);
    count += 1
    
print count
server.quit()
    
    
