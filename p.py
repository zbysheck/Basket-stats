l=[88,20,58,5,35,33,42,20,26,45,38,49,15,1,69]
t=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
a=0
i=0
while(1):
	a+=1;
	if t[i]==2:
		i+=1
	else:
		t[i]+=1
	sum=0
	for j in range(15):
		if t[j]==1:
			sum+=l[j]
		if(t[j]==2):
			sum-=l[j]
	if(sum==69):
		print sum
		print t