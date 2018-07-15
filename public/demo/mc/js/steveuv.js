var steveuv = {};

steveuv.header1 = [
    new THREE.Vector2(1/8,3/4),
    new THREE.Vector2(1/8,1/2),
    new THREE.Vector2(2/8,1/2),
    new THREE.Vector2(2/8,3/4)
]
steveuv.header2 = [
    new THREE.Vector2(2/8,3/4),
    new THREE.Vector2(2/8,1/2),
    new THREE.Vector2(3/8,1/2),
    new THREE.Vector2(3/8,3/4),
]
steveuv.header3 = [
    new THREE.Vector2(3/8,3/4),
    new THREE.Vector2(3/8,1/2),
    new THREE.Vector2(4/8,1/2),
    new THREE.Vector2(4/8,3/4),
]
steveuv.header4 = [
    new THREE.Vector2(0,3/4),
    new THREE.Vector2(0,1/2),
    new THREE.Vector2(1/8,1/2),
    new THREE.Vector2(1/8,3/4),
]
steveuv.header5 = [
    new THREE.Vector2(1/8,1),
    new THREE.Vector2(1/8,3/4),
    new THREE.Vector2(2/8,3/4),
    new THREE.Vector2(2/8,1)
]
steveuv.header6 = [
    new THREE.Vector2(2/8,1),
    new THREE.Vector2(2/8,3/4),
    new THREE.Vector2(3/8,3/4),
    new THREE.Vector2(3/8,1)
]

steveuv.headfaceVertexUvs = [];
steveuv.headfaceVertexUvs[0] = [];


steveuv.headfaceVertexUvs[0][0] = [steveuv.header1[0],steveuv.header1[1],steveuv.header1[3]]
steveuv.headfaceVertexUvs[0][1] = [steveuv.header1[1],steveuv.header1[2],steveuv.header1[3]]

steveuv.headfaceVertexUvs[0][2] = [steveuv.header3[0],steveuv.header3[1],steveuv.header3[3]]
steveuv.headfaceVertexUvs[0][3] = [steveuv.header3[1],steveuv.header3[2],steveuv.header3[3]]

steveuv.headfaceVertexUvs[0][4] = [steveuv.header5[0],steveuv.header5[1],steveuv.header5[3]]
steveuv.headfaceVertexUvs[0][5] = [steveuv.header5[1],steveuv.header5[2],steveuv.header5[3]]

steveuv.headfaceVertexUvs[0][6] = [steveuv.header6[0],steveuv.header6[1],steveuv.header6[3]]
steveuv.headfaceVertexUvs[0][7] = [steveuv.header6[1],steveuv.header6[2],steveuv.header6[3]]

steveuv.headfaceVertexUvs[0][8] = [steveuv.header4[0],steveuv.header4[1],steveuv.header4[3]]
steveuv.headfaceVertexUvs[0][9] = [steveuv.header4[1],steveuv.header4[2],steveuv.header4[3]]

steveuv.headfaceVertexUvs[0][10] = [steveuv.header2[0],steveuv.header2[1],steveuv.header2[3]]
steveuv.headfaceVertexUvs[0][11] = [steveuv.header2[1],steveuv.header2[2],steveuv.header2[3]]

steveuv.body1 = [
    new THREE.Vector2(5/16,3/8),
    new THREE.Vector2(5/16,0),
    new THREE.Vector2(7/16,0),
    new THREE.Vector2(7/16,3/8)
]

steveuv.body2 = [
    new THREE.Vector2(7/16,3/8),
    new THREE.Vector2(7/16,0),
    new THREE.Vector2(8/16,0),
    new THREE.Vector2(8/16,3/8)
]

steveuv.body3 = [
    new THREE.Vector2(8/16,3/8),
    new THREE.Vector2(8/16,0),
    new THREE.Vector2(10/16,0),
    new THREE.Vector2(10/16,3/8)
]

steveuv.body4 = [
    new THREE.Vector2(4/16,3/8),
    new THREE.Vector2(4/16,0),
    new THREE.Vector2(5/16,0),
    new THREE.Vector2(5/16,3/8)
]

steveuv.body5 = [
    new THREE.Vector2(5/16,4/8),
    new THREE.Vector2(5/16,3/8),
    new THREE.Vector2(7/16,3/8),
    new THREE.Vector2(7/16,4/8)
]

steveuv.body6 = [
    new THREE.Vector2(7/16,4/8),
    new THREE.Vector2(7/16,3/8),
    new THREE.Vector2(8/16,3/8),
    new THREE.Vector2(8/16,4/8)
]

steveuv.bodyfaceVertexUvs = [];
steveuv.bodyfaceVertexUvs[0] = [];

steveuv.bodyfaceVertexUvs[0][0] = [steveuv.body1[0],steveuv.body1[1],steveuv.body1[3]]
steveuv.bodyfaceVertexUvs[0][1] = [steveuv.body1[1],steveuv.body1[2],steveuv.body1[3]]

steveuv.bodyfaceVertexUvs[0][2] = [steveuv.body3[0],steveuv.body3[1],steveuv.body3[3]]
steveuv.bodyfaceVertexUvs[0][3] = [steveuv.body3[1],steveuv.body3[2],steveuv.body3[3]]

steveuv.bodyfaceVertexUvs[0][4] = [steveuv.body5[0],steveuv.body5[1],steveuv.body5[3]]
steveuv.bodyfaceVertexUvs[0][5] = [steveuv.body5[1],steveuv.body5[2],steveuv.body5[3]]

steveuv.bodyfaceVertexUvs[0][6] = [steveuv.body6[0],steveuv.body6[1],steveuv.body6[3]]
steveuv.bodyfaceVertexUvs[0][7] = [steveuv.body6[1],steveuv.body6[2],steveuv.body6[3]]

steveuv.bodyfaceVertexUvs[0][8] = [steveuv.body4[0],steveuv.body4[1],steveuv.body4[3]]
steveuv.bodyfaceVertexUvs[0][9] = [steveuv.body4[1],steveuv.body4[2],steveuv.body4[3]]

steveuv.bodyfaceVertexUvs[0][10] = [steveuv.body2[0],steveuv.body2[1],steveuv.body2[3]]
steveuv.bodyfaceVertexUvs[0][11] = [steveuv.body2[1],steveuv.body2[2],steveuv.body2[3]]


steveuv.hand1 = [
    new THREE.Vector2(11/16,3/8),
    new THREE.Vector2(11/16,0),
    new THREE.Vector2(12/16,0),
    new THREE.Vector2(12/16,3/8)
]

steveuv.hand2 = [
    new THREE.Vector2(12/16,3/8),
    new THREE.Vector2(12/16,0),
    new THREE.Vector2(13/16,0),
    new THREE.Vector2(13/16,3/8)
]

steveuv.hand3 = [
    new THREE.Vector2(13/16,3/8),
    new THREE.Vector2(13/16,0),
    new THREE.Vector2(14/16,0),
    new THREE.Vector2(14/16,3/8)
]

steveuv.hand4 = [
    new THREE.Vector2(10/16,3/8),
    new THREE.Vector2(10/16,0),
    new THREE.Vector2(11/16,0),
    new THREE.Vector2(11/16,3/8)
]

steveuv.hand5 = [
    new THREE.Vector2(11/16,4/8),
    new THREE.Vector2(11/16,3/8),
    new THREE.Vector2(12/16,3/8),
    new THREE.Vector2(12/16,4/8)
]

steveuv.hand6 = [
    new THREE.Vector2(12/16,4/8),
    new THREE.Vector2(12/16,3/8),
    new THREE.Vector2(13/16,3/8),
    new THREE.Vector2(13/16,4/8)
]

steveuv.handfaceVertexUvs = [];
steveuv.handfaceVertexUvs[0] = [];

steveuv.handfaceVertexUvs[0][0] = [steveuv.hand1[0],steveuv.hand1[1],steveuv.hand1[3]]
steveuv.handfaceVertexUvs[0][1] = [steveuv.hand1[1],steveuv.hand1[2],steveuv.hand1[3]]

steveuv.handfaceVertexUvs[0][2] = [steveuv.hand3[0],steveuv.hand3[1],steveuv.hand3[3]]
steveuv.handfaceVertexUvs[0][3] = [steveuv.hand3[1],steveuv.hand3[2],steveuv.hand3[3]]

steveuv.handfaceVertexUvs[0][4] = [steveuv.hand5[0],steveuv.hand5[1],steveuv.hand5[3]]
steveuv.handfaceVertexUvs[0][5] = [steveuv.hand5[1],steveuv.hand5[2],steveuv.hand5[3]]

steveuv.handfaceVertexUvs[0][6] = [steveuv.hand6[0],steveuv.hand6[1],steveuv.hand6[3]]
steveuv.handfaceVertexUvs[0][7] = [steveuv.hand6[1],steveuv.hand6[2],steveuv.hand6[3]]

steveuv.handfaceVertexUvs[0][8] = [steveuv.hand4[0],steveuv.hand4[1],steveuv.hand4[3]]
steveuv.handfaceVertexUvs[0][9] = [steveuv.hand4[1],steveuv.hand4[2],steveuv.hand4[3]]

steveuv.handfaceVertexUvs[0][10] = [steveuv.hand2[0],steveuv.hand2[1],steveuv.hand2[3]]
steveuv.handfaceVertexUvs[0][11] = [steveuv.hand2[1],steveuv.hand2[2],steveuv.hand2[3]]

steveuv.foot1 = [
    new THREE.Vector2(1/16,3/8),
    new THREE.Vector2(1/16,0),
    new THREE.Vector2(2/16,0),
    new THREE.Vector2(2/16,3/8)
]

steveuv.foot2 = [
    new THREE.Vector2(2/16,3/8),
    new THREE.Vector2(2/16,0),
    new THREE.Vector2(3/16,0),
    new THREE.Vector2(3/16,3/8)
]

steveuv.foot3 = [
    new THREE.Vector2(3/16,3/8),
    new THREE.Vector2(3/16,0),
    new THREE.Vector2(4/16,0),
    new THREE.Vector2(4/16,3/8)
]

steveuv.foot4 = [
    new THREE.Vector2(0,3/8),
    new THREE.Vector2(0,0),
    new THREE.Vector2(1/16,0),
    new THREE.Vector2(1/16,3/8)
]

steveuv.foot5 = [
    new THREE.Vector2(1/16,4/8),
    new THREE.Vector2(1/16,3/8),
    new THREE.Vector2(2/16,3/8),
    new THREE.Vector2(2/16,4/8)
]

steveuv.foot6 = [
    new THREE.Vector2(2/16,4/8),
    new THREE.Vector2(2/16,3/8),
    new THREE.Vector2(3/16,3/8),
    new THREE.Vector2(3/16,4/8)
]

steveuv.footfaceVertexUvs = [];
steveuv.footfaceVertexUvs[0] = [];

steveuv.footfaceVertexUvs[0][0] = [steveuv.foot1[0],steveuv.foot1[1],steveuv.foot1[3]]
steveuv.footfaceVertexUvs[0][1] = [steveuv.foot1[1],steveuv.foot1[2],steveuv.foot1[3]]

steveuv.footfaceVertexUvs[0][2] = [steveuv.foot3[0],steveuv.foot3[1],steveuv.foot3[3]]
steveuv.footfaceVertexUvs[0][3] = [steveuv.foot3[1],steveuv.foot3[2],steveuv.foot3[3]]

steveuv.footfaceVertexUvs[0][4] = [steveuv.foot5[0],steveuv.foot5[1],steveuv.foot5[3]]
steveuv.footfaceVertexUvs[0][5] = [steveuv.foot5[1],steveuv.foot5[2],steveuv.foot5[3]]

steveuv.footfaceVertexUvs[0][6] = [steveuv.foot6[0],steveuv.foot6[1],steveuv.foot6[3]]
steveuv.footfaceVertexUvs[0][7] = [steveuv.foot6[1],steveuv.foot6[2],steveuv.foot6[3]]

steveuv.footfaceVertexUvs[0][8] = [steveuv.foot4[0],steveuv.foot4[1],steveuv.foot4[3]]
steveuv.footfaceVertexUvs[0][9] = [steveuv.foot4[1],steveuv.foot4[2],steveuv.foot4[3]]

steveuv.footfaceVertexUvs[0][10] = [steveuv.foot2[0],steveuv.foot2[1],steveuv.foot2[3]]
steveuv.footfaceVertexUvs[0][11] = [steveuv.foot2[1],steveuv.foot2[2],steveuv.foot2[3]]