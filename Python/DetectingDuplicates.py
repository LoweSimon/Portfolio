"""Detecting duplicate numbers in sorted and unsorted lists.

For M269 18J TMA01 Question 3.

Student version 1: 29/4/18
"""

def sorted_has_duplicate(numbers):
    """Return True if numbers has at least 2 equal values, otherwise False.
    
    Assume numbers are in ascending order.
    """
    
    for index in range(len(numbers) - 1):
        if numbers[index] == numbers[index + 1]:
            return True
        return False
            
    


def has_duplicate(numbers):
    """Return True if numbers has at least 2 equal values, otherwise False."""
    
    for elem in numbers:
        if numbers.count(elem) > 1:
            return True
        return False








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

print('Tests for sorted_has_duplicate:')
print()
test('singleton', sorted_has_duplicate([4]), False)
test('sorted, no duplicate', sorted_has_duplicate([1,2,3]), False)
test('sorted, duplicate', sorted_has_duplicate([1,2,2,3]), True)
print()
print('Tests for has_duplicate (must work for sorted lists too):')
print()
test('singleton', has_duplicate([4]), False)
test('sorted, no duplicate', has_duplicate([1,2,3]), False)
test('unsorted, no duplicate', has_duplicate([3,1,2]), False)
test('sorted, duplicate', has_duplicate([1,2,2,3]), True)
test('unsorted, duplicate', has_duplicate([2,3,2,1]), True)

print()
print('Ran', ran, 'tests:', ran - failed, 'OK,', failed, 'FAILED')

if failed == 0:
    print('''You passed all our tests.''')
