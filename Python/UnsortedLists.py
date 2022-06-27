#!/usr/bin/env python3

"""An implementation of sets, using unsorted lists.

For M269 18J TMA01 Question 4.

Student version 1: 29/4/18
"""


class Set:
    """An unordered collection of unique items.

    This class assumes the items are immutable (numbers, tuples, strings).
    """
    
    def __init__(self):
        """Initialise the set to be empty."""
        self.items = []
    
    def has(self, item):
        """Return True if item is in the set, otherwise False."""
        return item in self.items
    
    def put(self, item):
        """Add item to the set."""
        assert not (item in self.items)
        self.items.append(item)
    
    def size(self):
        """Return the number of items in the set."""
        return len(self.items)
    
    def take(self, item):
        """Remove the item from the set."""
        index = 0
        while index < self.size():
            if self.items[index] == item:
                self.items.pop(index)
            else:
                index += 1
    
    def common(self, other):
        """Return a new set with the common items of this and the other set."""
        result = []
        for common in self.items:
            if common in result:
                result.append(common)
        return result
        
        





"""Tests for the Set ADT operations.

For M269 18J TMA01 Question 4.

version 1: 29/4/18
"""

from TMA01_Q4 import Set

failed = 0
ran = 0


def test(name, actual, expected):
    """Report if test passed or failed."""
    global ran, failed
    if actual == expected:
        print(name, 'OK')
    else:
        print(name, 'FAILED: got', actual, 'instead of', expected)
        failed += 1
    ran += 1


even = Set()
even.put(0)
even.put(2)
even.put(4)
even.put(6)

squares = Set()
squares.put(0)
squares.put(1)
squares.put(4)
squares.put(9)

even_squares = even.common(squares) # this must return the set with 0 and 4
test('even squares size', even_squares.size(), 2)
test('0 is an even square', even_squares.has(0), True)
test('4 is an even square', even_squares.has(4), True)
test('2 is even, not square', even_squares.has(2), False)

# intersection is commutative; check we obtain the same set
square_evens = squares.common(even)
test('same size', even_squares.size() == square_evens.size(), True)
for n in range(10):
    test('has ' + str(n), even_squares.has(n) == square_evens.has(n), True)

odd = Set()
odd.put(1)
odd.put(3)
# no number is both even and odd
test('no common numbers', odd.common(even).size(), 0)

print()
print('All tests run:', ran - failed, 'OK,', failed, 'FAILED')

if failed == 0:
    print('''You passed all our tests.''')