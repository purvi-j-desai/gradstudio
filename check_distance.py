import numpy as np
import string
from math import sqrt, log
from itertools import chain, product
from collections import defaultdict

def cosine_sim(u,v):
    return np.dot(u,v) / (sqrt(np.dot(u,u)) * sqrt(np.dot(v,v)))

#def ngrams(sentence, n):
#  return zip(*[sentence.split()[i:] for i in range(n)])


def generate_vocab(v, list1):
    if v == None:
        return set(list1)
    return set(v+list1)
    
s1 = []
vocab1 = []
blob_1 = open("essay_v1.txt").read()

exclude = set(string.punctuation)

for sentence in blob_1.split("\n"):
    #print "#", sentence,
    sentence = ''.join(ch for ch in sentence if ch not in exclude)
    s1 = sentence.split()
    vocab1 = vocab1 + s1
    #print s1
    #print "--", ngrams(sentence, 3),

#print set(vocab1)

vocab2 = []
blob_2 = open("essay_v2.txt").read()
for sentence in blob_2.split("\n"):
    #print "#", sentence,
    sentence = ''.join(ch for ch in sentence if ch not in exclude)
    s1 = sentence.split()
    vocab2 = vocab2 + s1
    #print s1
    #print "--", ngrams(sentence, 3),

#print set(vocab2)
'''
vocab3 = []
blob_3 = open("check_diff3.txt").read()
for sentence in blob_3.split("\n"):
    #print "#", sentence,
    sentence = ''.join(ch for ch in sentence if ch not in exclude)
    s1 = sentence.split()
    vocab3 = vocab3 + s1
    #print s1
    #print "--", ngrams(sentence, 3),
'''
vocab = set(vocab1 + vocab2)

def vectorize(s, vocab):
    return [s.count(i) for i in vocab]

#print vectorize()

def corpus2vectors(corpus):
    vectorized_corpus = []
    for i in corpus:
        print "\n**********************\nYour i is : ", i, "\n*******************************\n"
        vectorized_corpus.append((i, vectorize(i, vocab)))
    return vectorized_corpus, vocab

all_data = [vocab1, vocab2]
#print "\n\nAll data is: ", all_data,
#print "1:", all_data[0], "\n\n\n\n\n"
#print "2:", all_data[1],
corpus, vocab = corpus2vectors(all_data)
#print "Your corpus: ", corpus, "\n\n\n\n"
#print "Your vocab: ", corpus, "\n\n\n\n"

i = 1
j = 1
for sentx, senty in product(corpus, corpus):
    #print sentx[0]
    #print senty[0]
    print i, ":", j,
    j += 1
    if (j > len(corpus)):
        j = 1
        i += 1
    print " cosine =", cosine_sim(sentx[1], senty[1])
    print
    


